pipeline {
  agent any
  stages {
    stage('deploy') {
      steps {
        sshagent(['debian-ssh-credentials']) {
          sh "ssh -vvv -o StrictHostKeyChecking=no -T debian@niconico.io"
        }
      }
    }
  }
}