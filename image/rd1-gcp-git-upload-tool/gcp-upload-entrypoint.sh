#!/bin/bash
cd /google-cloud-sdk;
./install.sh;
source ~/.bashrc
gcloud init;
echo "請到您的專案底下，下以下命令："
echo "$ git checkout gcp-qatest"
echo "$ git remote add google https://source.developers.google.com/p/rd1-resources/r/[專案名稱]"
echo "$ git pull google gcp-qatest"