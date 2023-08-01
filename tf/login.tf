terraform {
  cloud {
    organization = "devopsenvalex"
    workspaces {
      name = "aks-test"
    }
  }
}