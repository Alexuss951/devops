terraform {
  cloud {
    organization = "devopsenvalex"
    workspaces {
      name = "devops-test"
    }
  }
}