pipeline {
  agent any
  stages {
    step(deploy) {
      sshagent(['debian-ssh-credentials']) {
        sh "ssh debian@niconico.io"
      }
    }
  }
}