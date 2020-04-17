pipeline {
  agent any
  stages {
    stage('deploy') {
      steps {
        sshagent(['debian-ssh-credentials']) {
          sh "ssh debian@niconico.io"
        }
      }
    }
  }
}