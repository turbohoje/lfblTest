# N Infra Docs

General docs for all infra / SRE initiatives.

This doc comes from the deprecated [eBay N SRE](https://docs.google.com/document/d/1eyxFFPYLIZrxU2UX38-2z09OGTgKo5Y53kLKPJpjIr4/edit#)

## Projects

Project | Description | Owners
------- | ----------- | ------
[infra-docs](https://github.corp.ebay.com/N/infra-docs) | Infra docs and maintenance history | All SRE
[infra-drone](https://github.corp.ebay.com/N/infra-drone) | New Drone-based pipeline. The goal is to migrate to this by the end of Feb 2017.|Paul, jsw, Punit
[infra-terraform](https://github.corp.ebay.com/N/infra-terraform)|Terraform manages GCP Projects (see [inspiration](https://medium.com/@GrahamJenson/treat-infrastructure-like-you-treat-code-e5b3c0ad925d#.ojpdunupo))|Paul, Punit
[infra-monitoring](https://github.corp.ebay.com/N/infra-monitoring)|Prometheus resources for cluster monitoring|Paul
[infra-vault](https://github.corp.ebay.com/N/infra-vault)|Not yet running. We need Vault to store secrets in clusters. The repo is stale and should be updated to use StatefulSets.|Christophe, Jack
[infra-consul](https://github.corp.ebay.com/N/infra-consul)|Not running yet. We need Consul as a persistent KV store for Vault. This repo is stale and should be updated to use StatefulSets.|Christophe
[infra-services](https://github.corp.ebay.com/N/infra-services)|Infra scripts to create scala service base images|Punit
prod deploy log|TODO: append-only database to log metadata about production deploys (timestamp, git commit, author, changeset) <p>**Update**: we might get this for free if we rely on [GitHub deployments API](https://developer.github.com/v3/repos/deployments/). Manually deploying to production via `drone deploy … prod` results in a deployment being created in GitHub. GH does not expose this in the UI but it can be queried via the API, and contains all the relevant deployment metadata (author, commit, branch, etc).|Christophe
[Old Jenkins pipeline](https://github.corp.ebay.com/N/infra/tree/master/pipeline)|Current Jenkins-based pipeline that almost all projects are using. Will be deprecated.|Punit
IAM via Google Groups|Users should join / be invited the appropriate [Google Groups](https://groups.google.com/a/ebay.com/forum/#!myforums). These are used to set group-wide permissions in Terraform, e.g. [this rule](https://github.corp.ebay.com/N/infra-terraform/blob/b8adf3c6aab3d26ad148e405a4cc2deda088cf66/project/nsync/iam.jsonnet#L27) makes all `n-eng` members Editors on the `ebay-nsync` project.|Punit, Paul, Christophe
K8S Ingress with https|Re-investigate K8S Ingress with https support in K8S 1.5.x, especially since we are not running multi-region apps. Then use Terraform to create the DNS record.

## GCP

All existing infra lives under the ebay-n project.
Two new projects exist to separate prod from all other environments per initiative. We also have shared projects that will contain common infrastructure that will be used across current and future initiatives.

1. N1 - Shopbot & Fabric
   1. [ebay-n1-nonprod](https://console.cloud.google.com/home/dashboard?project=ebay-n1-nonprod&organizationId=959645619243)
   1. [ebay-n1-prod](https://console.cloud.google.com/home/dashboard?project=ebay-n1-prod&organizationId=959645619243)
1. N2 - China
   1. [ebay-n2-nonprod](https://console.cloud.google.com/home/dashboard?project=ebay-n2-nonprod&organizationId=959645619243)
   1. [ebay-n2-prod](https://console.cloud.google.com/home/dashboard?project=ebay-n2-prod&organizationId=959645619243)
1. Shared - Catalog & Identity
   1. [npd-shared-nonprod](https://console.cloud.google.com/home/dashboard?project=npd-shared-nonprod&organizationId=959645619243)
   1. [npd-shared-prod](https://console.cloud.google.com/home/dashboard?project=npd-shared-prod&organizationId=959645619243)
   1. [npd-shared](https://console.cloud.google.com/home/dashboard?project=npd-shared&organizationId=959645619243)
1. Restricted - PII and Payments
   1. [npd-restricted-nonprod](https://console.cloud.google.com/home/dashboard?project=npd-restricted-nonprod&organizationId=959645619243)
   1. [npd-restricted-prod](https://console.cloud.google.com/home/dashboard?project=npd-restricted-prod&organizationId=959645619243)

<table style="text-align:center;">
<tr>
    <td bgcolor="#D7D2E9" color="black">ebay-n1-nonprod</td>
    <td bgcolor="#F6E6CD" color="black">ebay-n2-nonprod</td>
    <td bgcolor="#B0A7D7" color="black">ebay-n1-prod</td>
    <td bgcolor="#EECD9C" color="black">ebay-n2-prod</td>
</tr>
<tr>
    <td colspan="2" bgcolor="#DEE9D3" color="black">npd-shared-nonprod Catalog Identity</td>
    <td colspan="2" bgcolor="#C0D6A8" color="black">npd-shared-prod Catalog Identity</td>
</tr>
<tr>
    <td colspan="2" bgcolor="#EACACC" color="black">npd-restricted-nonprod pii</td>
    <td colspan="2" bgcolor="#D89D99" color="black">npd-restricted-prod pii</td>
</tr>
<tr>
    <td colspan="4" bgcolor="#D5E1F3" color="black">npd-shared GCR VM Images</td>
</tr>
</table>

### Domains at Namecheap.com
1. [nchant.us](https://nchant.us/)
1. [sync.us](http://nchant.us/)

### eBay Contacts
* Paul Son <pson@ebay.com>
* Punit Agrawal <punagrawal@ebay.com>
* Christophe Boudet <cboudet@ebay.com>
* Jeff White <jswhite@ebay.com>
* Mitchell Wyle <mwyle@ebay.com>
* Justin Meyer <jusmeyer@ebay.com>

## Slack
* `#infra`
* `#infra-core`
* `#infra-monitoring`
* `#eng`
* `#cloudspend-911`
* `#drone`

### Google Contacts
* Vic Iglesias <viglesias@google.com> – solutions architect: general GCP / K8S questions – good starting point for most questions
* David Oppenheimer <davidopp@google.com> – Eng: scheduling, autoscaling, GKE
* Wojciech Tyczynski <wojtekt@google.com> – Eng: scheduling, autoscaling, GKE
* Tim Hockin <thockin@google.com> – Senior Staff Eng: all K8S questions
* Aparna Sinha  <apsinha@google.com> – Product Management Lead, K8S / GKE
* Allan Naim  <anaim@google.com> – PM K8S, Cluster Federation
* Jaclyn Kollar <kollar@google.com>
* Dereck Niddery <derekniddery@google.com>

### SRE Onboarding
1. Add user to correct GitHub team (Owner, infra)
1. Add user with correct permissions to GCP projects
1. Add user to Slack
1. Kubernetes intro
1. [GKE+ intro](https://cloud.google.com/solutions/prep-container-engine-for-prod)
1. Aliases to work with clusters / project switching
1. Walk through infra projects
1. Read [eng-practices](https://github.corp.ebay.com/N/eng-practices)
1. [Trello](https://trello.com/b/5Zayg6Ye/devops)

### Resources
1. [Helm](https://github.com/kubernetes/helm) – template system for Kubernetes resources
1. [Vault](https://www.vaultproject.io/) – secrets storage
1. [Consul](https://www.consul.io/) – distributed k/v store, Vault backend
1. [Kubernetes](https://github.com/kubernetes/kubernetes) – cluster scheduling
1. [Prometheus](https://prometheus.io/) – in-cluster monitoring
1. [Drone](http://readme.drone.io/) – modern CI

### History

See `history/` for log of infra maintenance.
