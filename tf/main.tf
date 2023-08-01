
## Crear RG
resource "azurerm_resource_group" "rg" {
  name     = var.rg_name
  location = var.location
}


#Crear AKS cluster
resource "azurerm_kubernetes_cluster" "cluster" {
  name                = var.aks_cluster_name
  location            = var.location
  resource_group_name = var.rg_name
  dns_prefix          = "akstf"
  default_node_pool {
    name       = "default"
    node_count = var.node_pool_count
    vm_size    = var.node_pool_size
  }
  identity {
    type = "SystemAssigned"
  }
  depends_on = [azurerm_resource_group.rg]
}



