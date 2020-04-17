pipeline {
  agent any
  stages {
    stage('deploy') {
      steps {
        sshagent(credentials: ['debian-ssh-credentials']) {
          sh '''ssh -vvv -o StrictHostKeyChecking=no -T debian@niconico.io \\
"cd docker/simple-api/simple-php-api-boilerplate \\
git pull"'''
        }

      }
    }

  }
}