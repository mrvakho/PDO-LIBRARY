try{


    }
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
