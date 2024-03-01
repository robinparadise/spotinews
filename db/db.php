<?php
include 'config.php';

function getNews($category = null) {
  $conn = connectDB();
  if ($category) {
    $sql = "SELECT * FROM articles WHERE category = '$category'";
  } else {
    $sql = "SELECT * FROM articles";
  }
  $result = mysqli_query($conn, $sql);
  return $result;
}

function groupByCategory() {
  $conn = connectDB();
  $sql = "SELECT category, COUNT(*) as count FROM articles GROUP BY category";
  $result = mysqli_query($conn, $sql);
  return $result;
}

function getCategories() {
  $conn = connectDB();
  $sql = "SELECT DISTINCT category FROM articles";
  $result = mysqli_query($conn, $sql);
  return $result;
}
