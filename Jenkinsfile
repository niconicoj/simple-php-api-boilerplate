pipeline {
  agent any
  stages {
    stage('deploy') {
      steps {
        sshagent(credentials: ['debian-ssh-credentials']) {
          sh '''ssh -o StrictHostKeyChecking=no -t debian@niconico.io \\
"cd docker/simple-api/simple-php-api-boilerplate \\
git pull"'''
        }

      }
    }

  }
}