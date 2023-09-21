# resource "azurerm_resource_group" "rg-example" {
#   name     = "rg-example"
#   location = "West Europe"
# }

# resource "azurerm_network_security_group" "vnet-sg" {
#   name                = "rg-example-security-group"
#   location            = azurerm_resource_group.rg-example.location
#   resource_group_name = azurerm_resource_group.rg-example.name
# }

# resource "azurerm_virtual_network" "vnet-example" {
#   name                = "rg-example-network"
#   location            = azurerm_resource_group.rg-example.location
#   resource_group_name = azurerm_resource_group.rg-example.name
#   address_space       = ["10.10.0.0/16"]
#   dns_servers         = ["10.10.0.4", "10.10.0.5"]

#   subnet {
#     name           = "subnet1"
#     address_prefix = "10.10.1.0/24"
#   }

#   subnet {
#     name           = "subnet3"
#     address_prefix = "10.10.2.0/24"
#     security_group = azurerm_network_security_group.vnet-sg.id
#   }

#   tags = {
#     environment = "Prod"
#     costcenter  = "RRHH"
#   }
# }