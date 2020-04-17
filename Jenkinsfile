pipeline {
  agent any
  stages {
    sshagent(['debian-ssh-credentials']) {
      sh "ssh debian@niconico.io"
    }
  }
}