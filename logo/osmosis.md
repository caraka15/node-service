# Osmosis Dashboard

![OsmosisDashboard1](https://raw.githubusercontent.com/osmosis-labs/osmosis-monitor/master/screens/Osmosis_Dashboard_1.png)

A monitoring solution for Osmosis full nodes with [Prometheus](https://prometheus.io/), [Grafana](http://grafana.org/), [cAdvisor](https://github.com/google/cadvisor),
[NodeExporter](https://github.com/prometheus/node_exporter) and alerting with [AlertManager](https://github.com/prometheus/alertmanager).

## Guide

### Prerequisites

1. Install Docker Engine `>= 1.13`

```
sudo apt-get remove docker docker-engine docker.io
sudo apt-get update
sudo apt install docker.io -y
```

2. Install Docker Compose `>= 1.11`

```
sudo apt install docker-compose -y
```

3. Run an Osmosis full node. See https://get.osmosis.zone or https://docs.osmosis.zone/developing/cli/install.html to install the Osmosis binary

4. Enable the Prometheus metrics

- Set `prometheus = true` under instrumentation in the config.toml
- Set `enable = true` and `prometheus-retention-time = 1` under telemetry in the app.toml

5. Ensure the following ports are not in use

- `3000`
- `9100`
- `9092`
- `8001`

### Run

1. Export your public IP to an environment variable

```bash
export HOST_IP=$(dig +short txt ch whoami.cloudflare @1.0.0.1)
```

2. Clone this repository on your host

```bash
git clone https://github.com/osmosis-labs/osmosis-monitor.git
cd osmosis-monitor
```

3. _(optional)_ Define additional alerting rules. Edit the `prometheus/alert.rules` to configure additional rules. See [Prometheus documentation](https://prometheus.io/docs/prometheus/latest/configuration/alerting_rules/) for more details.

4. _(optional)_ Configure a `receiver` for the alerting notifications. Edit the `alertmanager/config.yaml` to configure additional rules. See [Alertmanager documentation](https://prometheus.io/docs/alerting/latest/configuration/#receiver) for more details.

5. Run the containers via `docker-compose`:

```bash
docker-compose up -d
```

The command will create the following containers:

- `Grafana` (visualize metrics) `http://<host-ip>:3000`
- `Prometheus` (metrics database) `http://<host-ip>:9092`
- `Prometheus-Pushgateway` (push acceptor for ephemeral and batch jobs) `http://<host-ip>:9091`
- `NodeExporter` (host metrics collector)
- `cAdvisor` (containers metrics collector)

### Usage

Once you have run `docker-compose` (**and Osmosis has caught up to the head of the chain**):

1. Go to `http://<host-ip>:3000`

2. Login with `admin` and `admin` as the username and password and set your new password

3. Go to the dashboards tab (the icon that looks like four squares). Select browse and then select the `Osmosis Dashboard`.

The dashboard can also be reached directly at `http://<host-ip>:3000/d/UJyurCTWz/osmosis-dashboard`

### Shutdown

To shut down all of the above docker containers but retain the data

```bash
docker-compose down
```

To shut down and delete all metrics collected

```bash
docker-compose down --volumes
```

## Osmosis Dashboard

The Osmosis Dashboard shows key metrics for monitoring the chain state as well as machine resource usage:

![OsmosisDashboard1](https://raw.githubusercontent.com/osmosis-labs/osmosis-monitor/master/screens/Osmosis_Dashboard_1.png)

![OsmosisDashboard2](https://raw.githubusercontent.com/osmosis-labs/osmosis-monitor/master/screens/Osmosis_Dashboard_2.png)

![OsmosisDashboard3](https://raw.githubusercontent.com/osmosis-labs/osmosis-monitor/master/screens/Osmosis_Dashboard_3.png)
