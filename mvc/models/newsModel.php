<?php 
class NewsModel extends DB {
    public function get() {
        // connect db and fetch data
        // data example
        return "Title of the news";
    }

    public function getAllArticles() {
        $qr = "SELECT id, title FROM news";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }

    public function getArticle($id) {
        $query = "SELECT * FROM news WHERE id = ?;";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        $data_arr = array();
        while ( $row = $stmt_result->fetch_assoc() ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }
}

?>