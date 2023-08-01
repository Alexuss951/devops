##  https://registry.terraform.io/modules/Azure/database/azurerm/latest


# module "database" {
#   source  = "Azure/database/azurerm"
#   version = "2.0.0"
  
#   resource_group_name = "mssql-server"
#   location            = var.location
#   db_name             = "mydatabase"
#   sql_admin_username  = "mradministrator"
#   sql_password        = "P@ssw0rd12345!"

#   tags = {
#     environment = "prod"
#     costcenter  = "finanzas"
#   }

# }