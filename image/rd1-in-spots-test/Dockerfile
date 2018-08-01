FROM ubuntu

ENV PATH=$PATH:/google-cloud-sdk/bin
ENV PROJECT=rd1-test-project
ENV CLUSTER=in-sports
ENV HOME=/k8s

RUN apt-get update --fix-missing \
    && apt-get install -y curl wget python

###安裝gcloud
RUN wget https://dl.google.com/dl/cloudsdk/channels/rapid/downloads/google-cloud-sdk-182.0.0-linux-x86_64.tar.gz \
    && tar zxvf google-cloud-sdk-182.0.0-linux-x86_64.tar.gz

###安裝k8s
RUN curl -LO https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl \
    && chmod +x ./kubectl \
    && mv ./kubectl /usr/local/bin/kubectl

COPY RD1-test-b8bd55016f28.json $HOME/.config/gcloud/application_default_credentials.json
COPY k8s-agent-entrypoint.sh /

RUN chmod +x /k8s-agent-entrypoint.sh \
    && gcloud auth activate-service-account --key-file=$HOME/.config/gcloud/application_default_credentials.json \
    && gcloud config set project $PROJECT \
    && gcloud container clusters get-credentials $CLUSTER --zone asia-east1-a
    
ENTRYPOINT ["/k8s-agent-entrypoint.sh"]