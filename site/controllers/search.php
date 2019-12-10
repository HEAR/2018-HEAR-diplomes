<?php

return function ($site) {

  $query   = get('q');
  $results = $site->search($query, 'title|prenom|pseudonyme|mention|atelier_groupe');

  return [
    'query'   => $query,
    'results' => $results,
  ];

};