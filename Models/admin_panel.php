<?php
require_once("base.php");

class AdminPanel extends Base {

  public function countUsers() {
      $query = $this->db->prepare("
      SELECT count(*) as total_users
      FROM users
    ");

      $query->execute();

      $count = $query->fetchAll( PDO::FETCH_ASSOC );
      return $count;
  
  }

  public function countProfiles() {
      $query = $this->db->prepare("
      SELECT count(*) as total_profiles
      FROM profiles
    ");

      $query->execute();

      $count = $query->fetchAll( PDO::FETCH_ASSOC );
      return $count;
  
  }

  public function countPosts() {
      $query = $this->db->prepare("
      SELECT count(*) as total_posts
      FROM posts
    ");

      $query->execute();

      $count = $query->fetchAll( PDO::FETCH_ASSOC );
      return $count;
  
  }

  public function countComments() {
      $query = $this->db->prepare("
      SELECT count(*) as total_comments
      FROM comments
    ");

      $query->execute();

      $count = $query->fetchAll( PDO::FETCH_ASSOC );
      return $count;
  
  }
  
  public function countCommentsId($post_id) {
      $query = $this->db->prepare("
      SELECT count(*) as total_comments
      FROM comments
      WHERE post_id = ?
    ");

      $query->execute([$post_id]);

      $count = $query->fetchAll( PDO::FETCH_ASSOC );
      return $count;
  
  }

}