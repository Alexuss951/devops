variable "location" {
  type        = string
  description = "Azure Region where  resources will be provisioned"
  default     = "West Europe"
}


variable "rg_name" {
  type        = string
  description = "Name of the Resource Group"
  default     = "aks-tf"
}


variable "aks_cluster_name" {
  type        = string
  description = "Name of the AKS Cluster"
  default     = "aks-cluster-tf"
}


variable "node_pool_count" {
  type        = string
  description = "Number of nodes in node pool"
  default     = "1"
}


variable "node_pool_size" {
  type        = string
  description = "VM type in node pool"
  default     = "standard_B2s"
}

