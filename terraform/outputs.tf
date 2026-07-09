output "namespace" {
  value = var.namespace
}

output "deployment" {
  value = kubernetes_deployment.smartdesk.metadata[0].name
}