resource "kubernetes_deployment" "smartdesk" {

  metadata {
    name      = var.app_name
    namespace = var.namespace
    labels = {
      app = var.app_name
    }
  }

  spec {

    replicas = var.replicas

    selector {

      match_labels = {
        app = var.app_name
      }
    }

    template {

      metadata {

        labels = {
          app = var.app_name
        }
      }

      spec {

       container {

        image = var.container_image

        name = var.app_name

        image_pull_policy = "Never"

        port {
            container_port = var.container_port
        }
        }
      }
    }
  }
}