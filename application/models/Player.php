<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends CI_Model 
{
    public function default_players()
    {
        $sql = "SELECT players.name, players.gender, sports.sport_name
                FROM players
                LEFT JOIN sports ON sports.player_id = players.id"; 
        
        return $this->db->query($sql)->result_array();
    }

    public function searchPlayers($search, $genders, $sports)
    {
        // Start building the SQL query
        $sql = "SELECT players.name, players.gender, GROUP_CONCAT(sports.sport_name) AS sport_name
                FROM players 
                LEFT JOIN sports ON players.id = sports.player_id";

        // Apply search criteria
        $conditions = array();
        if (!empty($search)) 
        {
            $conditions[] = "players.name LIKE '%" . $this->db->escape_like_str($search) . "%'";
        }
        if (!empty($genders)) 
        {
            $gender_conditions = array();
                foreach ($genders as $gender) 
                {
                    $gender_conditions[] = "players.gender = '" . $this->db->escape_str($gender) . "'";
                }
            $conditions[] = "(" . implode(" OR ", $gender_conditions) . ")";
        }
        if (!empty($sports)) 
        {
            $sport_conditions = array();
                foreach ($sports as $sport) 
                {
                    $sport_conditions[] = "sports.sport_name = '" . $this->db->escape_str($sport) . "'";
                }
            $conditions[] = "(" . implode(" OR ", $sport_conditions) . ")";
        }

        // Add WHERE clause if conditions exist
        if (!empty($conditions)) 
        {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        // Group by player name and gender to avoid duplicates
        $sql .= " GROUP BY players.name, players.gender";
        // Execute the query and return the result
        return $this->db->query($sql)->result_array();
     }
}


