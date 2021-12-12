# README

## Installing
```bash
git clone https://github.com/dlozic/karen.git && cd karen
npm install
```

## Preparing the database
```bash
vim .env         # edit the enviroment file
npm run db:fresh # run migrations and seed
```

## Running in development
```bash
npm start
```

## Cleanup
```bash
npm run clean
```