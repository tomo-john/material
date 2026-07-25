# VPSでGitの設定

## user.name と user.email

確認:

```bash
git config --global user.name
git config --global user.email
```

設定:

```bash
git config --global user.name "tomo-john"
git config --global user.email "GitHubに登録しているメールアドレス"
```

## SSHでの認証設定

VPS -> GitHubのSSH鍵認証を作る。

```bash
VPS -- SSH ---> GitHub
```

### Step1 SSH鍵を作る。

VPS上で実行:

```bash
ssh-keygen -t ed25519 -C "ubuntu-lab github"
```

=> passphraseは空で作成

### Step2 VPSの公開鍵をGitHubへ登録

VPSの`~/.ssh/id_ed25519.pub`の中身をコピー

=> `ssh-ed25519 AAAAC...... ubuntu-lab github`

GitHub -> Settings -> SSH and GPG keys -> New SSH key

- Title: ubuntu-lab
- Key type: Authentication Key
- Key: VPSで`cat ~/.ssh/id_ed25519.pub`したやつ貼り付け

### Step3 接続テスト

VPSから:

```bash
ssh -T git@github.com
```

初回は、`Are you sure you want to continue connecting (yes/no/[fingerprint])? ` -> yes

```
Warning: Permanently added 'github.com' (ED25519) to the list of known hosts.
Hi tomo-john! You've successfully authenticated, but GitHub does not provide shell access.
```

これでOK

