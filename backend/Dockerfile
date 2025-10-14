FROM node:18 AS build

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN chmod +x wait-for-it.sh

EXPOSE 5000
CMD ["./wait-for-it.sh", "db:5432", "--", "npm", "start"]
