<?php 
class NewsModel extends DB {
    public function get() {
        // connect db and fetch data
        // data example
        return "Title of the news";
    }

    public function getAllArticles() {
        $qr = "SELECT id, title, content, `image` FROM news";
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
        if ($stmt_result == false) {
            return json_encode("no_article_found");
        }
        
        $data_arr = array();
        while ( $row = $stmt_result->fetch_assoc() ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }

    public function ad_getAllArticles() {
        $qr = "SELECT id, title, content, image FROM `news`;";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);        
    }

    public function ad_addArticle($title, $content, $image){
        $qr = "INSERT INTO `news`(`title`, `content`, `image`) VALUES (?,?,?)";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('sss', $title, $content, $image);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function ad_editArticle($newsId, $title, $content, $image){
        $qr = "UPDATE `news` SET `title`=?, `content`=?, `image`=? WHERE id = ?;";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('sssi', $title, $content, $image, $newsId);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function ad_deleteArticle($newsId){
        $qr = "DELETE FROM `news` WHERE id = ?;";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('i', $newsId);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function ad_countNews() {
        $qr = "SELECT COUNT(*) as count FROM `news`";
        $rows =  mysqli_query($this->con, $qr);
        $row = mysqli_fetch_assoc($rows);
        return json_encode($row); 
    }    
}

?>