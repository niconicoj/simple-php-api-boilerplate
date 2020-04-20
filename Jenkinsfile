pipeline {
  agent any
  stages {
    stage('deploy') {
      steps {
        sshagent(credentials: ['debian-ssh-credentials']) {
          sh 'git push ssh://debian@niconico.io/home/debian/docker/simple-api/simple-php-api-boilerplate'
        }

      }
    }

  }
}