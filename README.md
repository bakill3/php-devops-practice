# PHP DevOps Practice
A comprehensive project to showcase and practice DevOps skills using PHP, Docker, Kubernetes (Minikube), Azure, and CI/CD with GitHub Actions. This project demonstrates the full cycle of development, containerization, orchestration, and deployment.

## 🚀 Features
- **PHP Web Application**: A simple PHP script (`index.php`) that connects to a PostgreSQL database and displays product data.
- **Dockerized Environment**: Includes a `Dockerfile` to containerize the PHP application for consistent deployment.
- **Kubernetes Deployment**: YAML files for deploying both the PHP app and PostgreSQL to Minikube or Azure Kubernetes Service (AKS).
- **CI/CD Pipeline**: GitHub Actions workflow for automated builds, testing, and deployment.
- **Azure Integration**: Ready for deployment to Azure services, leveraging **Azure Kubernetes Service (AKS)** for cloud-based orchestration.
- **Unit Testing**: PHPUnit tests to validate database connectivity and table existence.

## 🛠️ Getting Started
### Prerequisites
Ensure you have the following installed:
- **Docker**
- **Minikube**
- **Kubernetes CLI (kubectl)**
- **Composer**
- **PHP**
- **Git**
- **Azure CLI** (if deploying to Azure)

### Installation Steps
Clone the repository, install dependencies, build the Docker container, start Minikube, and deploy the application to Kubernetes:
```
git clone https://github.com/your-username/php-devops-practice.git
cd php-devops-practice
composer install
docker build -t php-devops-app .
docker run -p 8080:80 php-devops-app
minikube start --driver=docker
kubectl apply -f k8s/
```

To access the application, run:
```
minikube service php-service --url
```

## 🌐 Deploying to Azure Kubernetes Service (AKS)
1. **Create an AKS Cluster**:
   Use the Azure CLI to create and configure an AKS cluster:
   ```bash
   az aks create --resource-group myResourceGroup --name myAKSCluster --node-count 1 --enable-addons monitoring --generate-ssh-keys
   ```
2. **Connect to the AKS Cluster: Retrieve credentials and configure kubectl to use the created AKS cluster:**
    ```
    az aks get-credentials --resource-group myResourceGroup --name myAKSCluster
    ```
3. **Deploy to AKS: Apply the Kubernetes manifests to your AKS cluster:**
    ```
    kubectl apply -f k8s/
    ```
4. **Monitor and Scale: Use kubectl commands to monitor the status of your pods and scale the deployments as needed:**
    ```
    kubectl get pods
    kubectl scale deployment php-app-deployment --replicas=3
    ```
## ⚙️ CI/CD Pipeline
The project includes a GitHub Actions workflow that:
- Checks out the code.
- Installs PHP and Composer dependencies.
- Builds and deploys the Docker image.
- Applies the Kubernetes manifests for deployment.

## 🧪 Running Tests
Run the PHPUnit tests to check database connection and table creation:
```
vendor/bin/phpunit tests
```

## 📘 Additional Resources
- [Minikube Documentation](https://minikube.sigs.k8s.io/docs/)
- [Kubernetes Documentation](https://kubernetes.io/docs/home/)
- [Azure Kubernetes Service (AKS) Documentation](https://docs.microsoft.com/en-us/azure/aks/)

## 🤝 Contributing
Contributions are welcome! Please submit a pull request or open an issue for any improvements or suggestions.


