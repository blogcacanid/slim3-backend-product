<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });

    $app->group('/api', function () { // group route

        /*** Display a listing of the resource. ***/
        $this->get("/products/", function (Request $request, Response $response, array $args){
            $sql = "SELECT * FROM products";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $result = $stmt->fetchAll();
            if($mainCount==0) {
                return $this->response->withJson(['status' => 'error', 'message' => 'no result data.'],200); 
            }
            return $response->withJson($result, 200);
        });

        /*** Display the specified resource. ***/
        $this->get("/product/{id}", function (Request $request, Response $response, array $args){
            $product_id = trim(strip_tags($args["id"]));
            $sql = "SELECT * FROM products WHERE product_id=:product_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam("product_id", $product_id);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $result = $stmt->fetchObject();
            if($mainCount==0) {
                return $this->response->withJson(['status' => 'error', 'message' => 'no result data.'],200); 
            }
            return $response->withJson($result);
        });

        /*** ADD created resource in storage. ***/
        $this->post('/products', function (Request $request, Response $response, array $args) {
            $input = $request->getParsedBody();
            $product_name=trim(strip_tags($input['product_name']));
            $product_price=trim(strip_tags($input['product_price']));
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');
            $sql = "INSERT INTO products(product_name, product_price, created_at, updated_at) 
                VALUES(:product_name, :product_price, :created_at, :updated_at)";
            $sth = $this->db->prepare($sql);
            $sth->bindParam("product_name", $product_name);             
            $sth->bindParam("product_price", $product_price);            
            $sth->bindParam("created_at", $created_at);            
            $sth->bindParam("updated_at", $updated_at);            
            $StatusInsert=$sth->execute();
            if($StatusInsert){
                return $this->response->withJson(['success' => true, 'message' => 'Product Update Successfully!.'],200); 
            } else {
                return $this->response->withJson(['status' => 'error', 'message' => 'error insert products.'],200); 
            }
        });

        /*** PUT - Update the specified resource in storage. ***/
        $this->put('/products/{id}', function (Request $request, Response $response, array $args) {
            $input = $request->getParsedBody();
            $product_id = trim(strip_tags($args["id"]));
            $product_name=trim(strip_tags($input['product_name']));
            $product_price=trim(strip_tags($input['product_price']));
            $updated_at = date('Y-m-d H:i:s');
            $sql = "UPDATE products SET product_name=:product_name, product_price=:product_price, updated_at=:updated_at WHERE product_id=:product_id";
            $sth = $this->db->prepare($sql);
            $sth->bindParam("product_id", $product_id);
            $sth->bindParam("product_name", $product_name);              
            $sth->bindParam("product_price", $product_price);            
            $sth->bindParam("updated_at", $updated_at);            
            $StatusUpdate=$sth->execute();
            if($StatusUpdate){
                return $this->response->withJson(['status' => true, 'message' => 'Product updated successfully.'],200); 
            } else {
                return $this->response->withJson(['status' => 'error', 'message' => 'error update products.'],200); 
            }
        });

        /*** PATCH - Update the specified resource in storage. ***/
        $this->patch('/products/{id}', function (Request $request, Response $response, array $args) {
            $input = $request->getParsedBody();
            $product_id = trim(strip_tags($args["id"]));
            $product_name=trim(strip_tags($input['product_name']));
            $product_price=trim(strip_tags($input['product_price']));
            $updated_at = date('Y-m-d H:i:s');
            $sql = "UPDATE products SET product_name=:product_name, product_price=:product_price, updated_at=:updated_at WHERE product_id=:product_id";
            $sth = $this->db->prepare($sql);
            $sth->bindParam("product_id", $product_id);
            $sth->bindParam("product_name", $product_name);              
            $sth->bindParam("product_price", $product_price);            
            $sth->bindParam("updated_at", $updated_at);            
            $StatusUpdate=$sth->execute();
            if($StatusUpdate){
                return $this->response->withJson(['status' => true, 'message' => 'Product updated successfully.'],200); 
            } else {
                return $this->response->withJson(['status' => 'error', 'message' => 'error update products.'],200); 
            }
        });

        /*** DELETE the specified resource. ***/
        $this->delete('/products/{id}', function (Request $request, Response $response, array $args) {
            $product_id = trim(strip_tags($args["id"]));
            $sql = "DELETE FROM products WHERE product_id=:product_id";
            $sth = $this->db->prepare($sql);
            $sth->bindParam("product_id", $product_id);    
            $StatusDelete=$sth->execute();
            if($StatusDelete){
                return $this->response->withJson('Product Deleted Successfully'); 
            } else {
                return $this->response->withJson(['status' => 'error', 'message' => 'error delete products.'],200); 
            }
        });

    });

};
