pipeline {
    agent any

    stages {
        stage('Git clone') {
            steps {
                git branch: 'main', url: 'https://github.com/mahmuda-bjit/new_aws_php.git'
            }
        }
        
        stage('Build docker image 🐳'){
            steps{
                script{
                    sh 'docker build -t mahmudakeya/my-php-app .'
                }
            }
        }

        
        stage('Push image to Docker Hub 🚀'){
            steps{
                script{
                   withCredentials([string(credentialsId: 'dockerhub-pwd-php', variable: 'dockerhubpwd')]) { 
                       sh 'docker login -u mahmudakeya -p ${dockerhubpwd}'
                   }
                   sh 'docker push mahmudakeya/my-php-app'
                }
            }
        }
        
        
        stage('Deploy') {
    steps {
        // 1. Deploy it in the web server
        // For example, if using Apache:
        sh 'rsync -avz -vv ./ /var/www/html'

        // Pull the latest image before running the container
        script {
            docker.image("mahmudakeya/my-php-app:latest").pull()
        }

        // Or if using Docker to run PHP application:
        script {
            docker.image("mahmudakeya/my-php-app:latest").withRun('-p 8081:80') {
                // Replace 'my-php-app' with the name you used in the 'docker.build' step

                echo "PHP Application is running on http://public-ip-address:8081"
            }
        }
    }
}

    }

    post {
        always {
            //remove any temporary files:
            sh 'rm -rf vendor'
        }
    }
}
