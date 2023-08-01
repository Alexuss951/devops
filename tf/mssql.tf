data "azurerm_client_config" "current" {}

resource "azurerm_resource_group" "mssql-rg" {
  name     = "mssql-db-server"
  location = "West Europe"
}

resource "azurerm_user_assigned_identity" "mssql_user" {
  name                = "sql-admin"
  location            = azurerm_resource_group.mssql-rg.location
  resource_group_name = azurerm_resource_group.mssql-rg.name
}



## Crear Database Server

resource "azurerm_mssql_server" "msssql-server" {
  name                         = "mssql-server01"
  resource_group_name          = azurerm_resource_group.mssql-rg.name
  location                     = azurerm_resource_group.mssql-rg.location
  version                      = "12.0"
  administrator_login          = "YoSoyAdmin"
  administrator_login_password = "123456Pa!"
  minimum_tls_version          = "1.2"

  azuread_administrator {
    login_username = azurerm_user_assigned_identity.mssql_user.name
    object_id      = azurerm_user_assigned_identity.mssql_user.principal_id
  }

  identity {
    type         = "UserAssigned"
    identity_ids = [azurerm_user_assigned_identity.mssql_user.id]
  }

  primary_user_assigned_identity_id            = azurerm_user_assigned_identity.mssql_user.id
  transparent_data_encryption_key_vault_key_id = azurerm_key_vault_key.mykey.id
}

# Crear un key vault con  access policies  get, list, create, delete, update, recover, purge y getRotationPolicy para la key vault key
resource "azurerm_key_vault" "kv01" {
  name                        = "mssql-kv00987"
  location                    = azurerm_resource_group.mssql-rg.location
  resource_group_name         = azurerm_resource_group.mssql-rg.name
  enabled_for_disk_encryption = true
  tenant_id                   = azurerm_user_assigned_identity.mssql_user.tenant_id
  soft_delete_retention_days  = 7
  purge_protection_enabled    = true

  sku_name = "standard"

  access_policy {
    tenant_id = data.azurerm_client_config.current.tenant_id
    object_id = data.azurerm_client_config.current.object_id

    key_permissions = ["Get", "List", "Create", "Delete", "Update", "Recover", "Purge", "GetRotationPolicy"]
  }

  access_policy {
    tenant_id = azurerm_user_assigned_identity.mssql_user.tenant_id
    object_id = azurerm_user_assigned_identity.mssql_user.principal_id

    key_permissions = ["Get", "WrapKey", "UnwrapKey"]
  }
}

##Crear una key en Azure Key Vault
resource "azurerm_key_vault_key" "mykey" {
  depends_on = [azurerm_key_vault.kv01]

  name         = "my-key"
  key_vault_id = azurerm_key_vault.kv01.id
  key_type     = "RSA"
  key_size     = 2048

  key_opts = ["unwrapKey", "wrapKey"]
}




##Crear bases de datos
resource "azurerm_mssql_database" "databases" {
    for_each = local.sql_dbs
    name = each.value
    server_id = azurerm_mssql_server.msssql-server.id

    sku_name = "Basic"

    depends_on = [ azurerm_mssql_server.msssql-server ]
  
}