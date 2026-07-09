variable "namespace" {
  default = "smartdesk"
}

variable "app_name" {
  default = "smartdesk-app"
}

variable "replicas" {
  default = 2
}

variable "container_image" {
  default = "smartdesk:latest"
}

variable "container_port" {
  default = 10000
}