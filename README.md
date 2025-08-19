# README – Setup do Projeto Laravel com Sail (MySQL)

Este guia explica como preparar e executar o projeto localmente usando **Laravel Sail** com **MySQL**.  
Pressupõe que você já utiliza **WSL**, **Docker**, **NVM/Node.js** e **Composer** instalados e funcionando.

---

## 🚀 Passo a passo

### 1) Clonar o repositório
```bash
git clone https://github.com/nobreozeas/clinica
cd clinica
```

### 2) Configurar variáveis de ambiente
Copie o arquivo de exemplo e renomeie:
```bash
cp .env.example .env
```

### 3) Remover o `docker-compose.yml` existente
> O projeto utiliza o `docker-compose.yml` gerado pelo Sail.
```bash
rm -f docker-compose.yml
```

### 4) Instalar dependências PHP
```bash
composer install
```

### 5) Instalar e configurar o Laravel Sail
```bash
composer require laravel/sail --dev
php artisan sail:install
```
Quando solicitado, **selecione o banco `mysql`** (use a barra de espaço para marcar e Enter para confirmar).

### 6) Subir os containers
```bash
./vendor/bin/sail up -d
```
> Dica: Você pode criar um alias opcional (`alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`) para usar apenas `sail`.

### 7) Gerar a chave da aplicação
```bash
sail artisan key:generate
```

### 8) Instalar dependências JavaScript
```bash
sail npm install
```

### 9) Executar migrações do banco
```bash
sail artisan migrate
```

### 10) Preparar o seeder principal
Abra `database/seeders/DatabaseSeeder.php` e **descomente** as linhas dentro de:
```php
public function run(): void
{
    $this->call([
        // Ex.: UsersTableSeeder::class,
        //      RolesTableSeeder::class,
        //      ...
    ]);
}
```
> Remova os `//` das classes que você deseja popular.

### 11) Popular o banco de dados
```bash
sail artisan db:seed
```

### 12) Rodar o front-end em modo desenvolvimento
```bash
sail npm run dev
```

### 13) Acessar a aplicação
Abra o navegador em:
```
http://localhost
```

---

## ⚙️ Ajustes no `.env`

Garanta que as variáveis de banco estejam compatíveis com o Sail (padrão):
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

Se você alterou o nome do serviço ou credenciais na instalação, ajuste aqui.

---

## 🧪 Comandos úteis

- Parar containers:
  ```bash
  sail down
  ```
- Ver logs:
  ```bash
  sail logs -f
  ```
- Rodar testes:
  ```bash
  sail artisan test
  ```
- Recriar containers (sem cache):
  ```bash
  sail down -v && sail build --no-cache && sail up -d
  ```

---

## 🛠️ Solução de problemas

- **`sail: command not found`**  
  Use o caminho completo: `./vendor/bin/sail <comando>` ou crie o alias sugerido.

- **Portas em uso (3306, 80, 5173, etc.)**  
  Pare serviços locais em conflito (ex.: MySQL nativo/Apache) ou mude portas no `docker-compose.yml` gerado pelo Sail.

- **Erro de conexão ao banco**  
  Verifique as variáveis `DB_*` no `.env`.  
  Rode `sail ps` para confirmar se o serviço `mysql` está `Up`.  
  Se necessário, reinicialize:
  ```bash
  sail down -v
  sail up -d
  sail artisan migrate:fresh --seed
  ```

- **Assets/front não carregam**  
  Confirme se o `sail npm run dev` está em execução e que a URL do Vite está correta no `.env` (se aplicável):
  ```
  VITE_HOST=localhost
  VITE_PORT=5173
  ```

---

## 📦 Rebuild após mudanças no `docker-compose.yml`
Se você ajustar o `docker-compose.yml` do Sail:
```bash
sail down
sail build --no-cache
sail up -d
```

---

## ✅ Pronto!
Com esses passos, sua aplicação Laravel deve estar rodando em `http://localhost`.  
Qualquer dúvida, verifique os logs com `sail logs -f` e revise as configurações do `.env`.
