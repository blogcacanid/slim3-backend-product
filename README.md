# slim3-backend-product
Back End Product Slim 3

> https://blog.cacan.id/back-end-product-slim-3

![000](https://user-images.githubusercontent.com/51890752/85023068-6bd08c00-b19e-11ea-88d5-7d68bec09ab3.jpg)

# Cara Penggunaan:

## Clone dari GitHub:
- git clone https://github.com/blogcacanid/slim3-backend-product.git

## Lalu masuk ke direktori project:
- cd slim3-backend-product

## Selanjutnya jalankan perintah berikut secara berurutan:
- cp .env.example .env
- composer install

# Testing
Jalankan Slim 3 dengan menggunakan perintah berikut:
- composer start

### Testing via Postman
Untuk testing kita akan menggunakan Postman.

#### GET
GET : digunakan untuk mengambil data dari server
##### All Record
Buka postman lalu pilih method GET kemudian ketikkkan URL http://localhost:8080/api/products/
![001](https://user-images.githubusercontent.com/51890752/85023106-7c810200-b19e-11ea-8a39-922a22cc698a.jpg)


##### Get berdasarkan ID
Buka postman lalu pilih method GET kemudian ketikkkan URL http://localhost:8080/api/product/10
![002](https://user-images.githubusercontent.com/51890752/85023151-8e62a500-b19e-11ea-997e-f6757f95d4ca.jpg)


#### POST
POST : digunakan untuk menambah data
Buka postman lalu pilih method POST kemudian ketikkkan URL  http://localhost:8080/api/products

Kemudian pilih tab Body. Lalu pada radiobox pilih raw dan typenya pilih JSON. Selanjutnya pada bagian textbox inputkan data registrasinya seperti berikut:
{
	"product_name":"Naturein Bed Spray Anti-Bacterial 100ML",
	"product_price":"119000"
}
Selanjutnya klik tombol Send
![003](https://user-images.githubusercontent.com/51890752/85023183-9884a380-b19e-11ea-8361-d6ef2b356b14.jpg)


#### PUT
PUT : digunakan untuk mengupdate data
Buka postman lalu pilih method PUT kemudian ketikkkan URL http://localhost:8080/api/products/8

Kemudian pilih tab Body. Lalu pada radiobox pilih raw dan typenya pilih JSON. Selanjutnya pada bagian textbox inputkan data registrasinya seperti berikut:
{
	"product_name":"MAMA LEMON 800ml pch",
	"product_price":"11911"
}
Selanjutnya klik tombol Send
![004](https://user-images.githubusercontent.com/51890752/85023225-a4706580-b19e-11ea-872e-c409c944f655.jpg)


### DELETE
DELETE : digunakan untuk menghapus data
Buka postman lalu pilih method DELETE dan ketikkkan URL http://localhost:8080/api/products/8
Selanjutnya klik tombol Send
![005](https://user-images.githubusercontent.com/51890752/85023257-ad613700-b19e-11ea-81a4-d201ec21dadf.jpg)



# Slim Framework 3 Skeleton Application

Use this skeleton application to quickly setup and start working on a new Slim Framework 3 application. This application uses the latest Slim 3 with the PHP-View template renderer. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.

    php composer.phar create-project slim/slim-skeleton [my-app-name]

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writeable.

To run the application in development, you can run these commands 

	cd [my-app-name]
	php composer.phar start
	
Or you can use `docker-compose` to run the app with `docker`, so you can run these commands:

         cd [my-app-name]
	 docker-compose up -d
After that, open `http://0.0.0.0:8080` in your browser.

Run this command in the application directory to run the test suite

	php composer.phar test

That's it! Now go build something cool.
