<?php header('Content-type: text/css'); ?>
@media print {
  .print {
    display: none !important;
  }

  table, tr, td, th {
    border-collapse: collapse;
  }

  table tr:nth-child(1) {
    color: red;
  }
}

@page {
  size: auto;
  margin: 0mm;
}