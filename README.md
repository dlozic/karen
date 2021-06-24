# Karen

## Installing

```bash
git clone https://github.com/dlozic/karen.git && cd karen
cp .env.example .env
npm run chmod
npm install
```

## Running in development
```bash
# prepare your environment file
vim .env
npm start
```

## Preparing the database
```bash
# runing migrations and seed
npm run db_fresh
```

```bash
# if you need a docker db
sudo docker run -d --name postgres-db -p 5432:5432 -e POSTGRES_PASSWORD=postgres postgres
```