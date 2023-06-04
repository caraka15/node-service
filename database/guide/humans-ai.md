## <strong>About the Humans Project</strong><br>

HUMANS is a next generation blockchain platform that brings together an ecosystem of stakeholders around the use of AI to create at scale. It combines a library of AI tools into a creative studio suite where users will be able to pick and choose as they bring their ideas to life. Individuals are empowered to create and own their digital likenesses, which may be used by themselves and others in the creation of any number of digital assets. The synthetic media, AI apps, and other digital assets utilize blockchain technology to generate Non-Fungible Tokens (NFTs) as a way of creating transparency, accountability, and long term governance.

#### <strong>Useful Links</strong><br>
<a href="https://www.humans.ai"><strong>WebSite</strong></a><br>
<a href="https://docs.humans.zone"><strong>Official Docs</strong></a><br>
<a href="https://explorer.humans.zone"><strong>Explorer</strong></a>

#### <strong>Socials</strong><br>
<a href="https://twitter.com/humansdotai"><strong>Twitter</strong></a><br>
<a href="https://t.me/humansdotai"><strong>Telegram</strong></a><br>
<a href="https://discord.gg/humansdotai"><strong>Discord</strong></a><br>
<a href="https://instagram.com/humansdotai"><strong>Instagram</strong></a><br>
<a href="https://youtube.com/channel/UCRPyI284yy0FWWz9YEWx2XQ"><strong>Youtube</strong></a><br>
<a href="https://medium.com/humansdotai"><strong>Medium</strong></a><br>

#### <strong>Hardware requirements</strong><br>
Memory: 32 GB RAM<br>
CPU: 8-Core<br>
Disk: 200 GB of storage<br>
OS: Ubuntu Linux 20.04 (LTS) x64<br>
Bandwidth: 1 Gbps for Download / 100 Mbps for Upload<br>


### <strong>Installation Guide</strong><br>

#### Update packages and Install dependencies
```
sudo apt update && sudo apt upgrade -y
sudo apt install curl iptables build-essential git wget jq make gcc nano tmux htop nvme-cli pkg-config libssl-dev libleveldb-dev tar net-tools clang git ncdu -y
```
#### Isntall Go
```
ver="1.19.4" && \
wget "https://golang.org/dl/go$ver.linux-amd64.tar.gz" && \
sudo rm -rf /usr/local/go && \
sudo tar -C /usr/local -xzf "go$ver.linux-amd64.tar.gz" && \
rm "go$ver.linux-amd64.tar.gz" && \
echo "export PATH=$PATH:/usr/local/go/bin:$HOME/go/bin" >> $HOME/.bash_profile && \
source $HOME/.bash_profile && \
go version
```
#### Download & Compile Binaries
```
cd $HOME
rm -rf humans 
git clone https://github.com/humansdotai/humans
cd humans/
git checkout v1.0.0go build -o testnet-1 cmd/testnet-1/main.go
sudo cp testnet-1 /usr/local/bin/testnet-1testnet-1 version
```
#### Init App (replace moniker with any name)
```
humansd init <moniker> --chain-id testnet-1
humansd config chain-id testnet-1
```
#### Downloading Genesis 
```
curl -s https://rpc-testnet.humans.zone/genesis | jq -r .result.genesis > genesis.json
```
#### Set seeds and peers
```
SEEDS=""
PEERS="1df6735ac39c8f07ae5db31923a0d38ec6d1372b@45.136.40.6:26656,9726b7ba17ee87006055a9b7a45293bfd7b7f0fc@45.136.40.16:26656,6e84cde074d4af8a9df59d125db3bf8d6722a787@45.136.40.18:26656,eda3e2255f3c88f97673d61d6f37b243de34e9d9@45.136.40.13:26656,4de8c8acccecc8e0bed4a218c2ef235ab68b5cf2@45.136.40.12:26656"
sed -i -e "s/^seeds *=.*/seeds = \"$SEEDS\"/; s/^persistent_peers *=.*/persistent_peers = \"$PEERS\"/" $HOME/.humans/config/config.toml
```
#### Configure pruning
```
sed -i -e "s/^pruning *=.*/pruning = \"nothing\"/" $HOME/.humans/config/app.toml
sed -i -e "s/^pruning-keep-recent *=.*/pruning-keep-recent = \"100\"/" $HOME/.humans/config/app.toml
sed -i -e "s/^pruning-interval *=.*/pruning-interval = \"50\"/" $HOME/.humans/config/app.toml
```
#### Set minimum gas price
```
sed -i 's/minimum-gas-prices =.*/minimum-gas-prices = "0.025uheart"/g' $HOME/.humans/config/app.toml
```
#### Enable Prometheus and disable Indexing (optional)
```
sed -i -e "s/prometheus = false/prometheus = true/" $HOME/.humans/config/config.toml
sed -i -e "s/^indexer *=.*/indexer = \"null\"/" $HOME/.humans/config/config.toml
```
#### Clean old data
```
humansd tendermint unsafe-reset-all --home $HOME/.humans --keep-addr-book
```
#### Create service file
```
sudo tee /etc/systemd/system/humansd.service > /dev/null <<EOF
[Unit]
Description=humans node
After=network-online.target

[Service]
User=$USER
ExecStart=$(which humansd) start --home $HOME/.humans
Restart=on-failure
RestartSec=3
LimitNOFILE=65535

[Install]
WantedBy=multi-user.target
EOF
```
#### Enable and start service
```
sudo systemctl daemon-reload
sudo systemctl enable humansd
sudo systemctl restart humansd
sudo journalctl -u humansd -f
```
#### Creating Wallet and Validator (don't forget to save mnemonic for wallet)
```
humansd keys add wallet
```
#### Join Humans AI discord (link above) and request test tokens from the faucet
```
$request YOUR_WALLET_ADDRESS
```
#### Check sync status of the node (do not create validator until node synchronized)
```
humansd status 2>&1 | jq .SyncInfo.catching_up
```
#### Create Validator (change ANY_NAME to preferable)
```
humansd tx staking create-validator \
--amount=9000000uheart \
--pubkey=$(humansd tendermint show-validator) \
--moniker="ANY_NAME" \
--chain-id=testnet-1 \
--commission-rate=0.1 \
--commission-max-rate=0.2 \
--commission-max-change-rate=0.05 \
--min-self-delegation=1 \
--fees=10000uheart \
--from=wallet \
-y
```
#### Check your validator's data
```
humansd q staking validator $(humansd keys show wallet --bech val -a)
```





















