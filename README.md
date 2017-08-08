## Projects

Project | Description | Owners
------- | ----------- | ------
infra-docs | Infra docs and maintenance history | All SRE
infra-drone | New Drone-based pipeline. The goal is to migrate to this by the end of Feb 2017.|Paul, jsw, Punit
infra-terraform|Terraform manages GCP Projects (see inspiration)|Paul, Punit
infra-monitoring|Prometheus resources for cluster monitoring|Paul
infra-vault|Not yet running. We need Vault to store secrets in clusters. The repo is stale and should be updated to use StatefulSets.|Christophe, Jack
infra-consul|Not running yet. We need Consul as a persistent KV store for Vault. This repo is stale and should be updated to use StatefulSets.|Christophe
infra-services|Infra scripts to create scala service base images|Punit
prod deploy log|TODO: append-only database to log metadata about production deploys (timestamp, git commit, author, changeset) <p>Update: we might get this for free if we rely on GitHub deployments API. Manually deploying to production via drone deploy … prod results in a deployment being created in GitHub. GH does not expose this in the UI but it can be queried via the API, and contains all the relevant deployment metadata (author, commit, branch, etc).|Christophe
Old Jenkins pipeline|Current Jenkins-based pipeline that almost all projects are using. Will be deprecated.|Punit
IAM via Google Groups|Users should join / be invited the appropriate Google Groups. These are used to set group-wide permissions in Terraform, e.g. this rule makes all n-eng members Editors on the ebay-nsync project.|Punit, Paul, Christophe
K8S Ingress with https|Re-investigate K8S Ingress with https support in K8S 1.5.x, especially since we are not running multi-region apps. Then use Terraform to create the DNS record.

