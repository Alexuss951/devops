# # Variable que indica la cantidad de grupos de recursos que deseas crear
# variable "num_resource_groups" {
#   type    = number
#   default = 10  # Puedes cambiar este valor al número deseado
# }




# # Crear grupos de recursos utilizando un ciclo count
# resource "azurerm_resource_group" "rgs" {
#   count = var.num_resource_groups

#   name     = "rg${count.index + 1}"  # Genera nombres como rg1, rg2, rg3, ...
#   location = "eastus"  # Ubicación recursos
# }