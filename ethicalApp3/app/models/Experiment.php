<?php

class Experiment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

   public function getExperiments(){
      $this->db->query("SELECT *, 
                        experiments.id as experimentId,
                        user_id as userId,
                        experiments.created_at as experimentCreated,
                        user.created_at as userCreated
                        FROM experiments
                        INNER JOIN user
                        ON experiments.user_id = user.id
                        ORDER BY experiments.created_at DESC");

                    
        $results = $this->db->resultSet();

        return $results;
    }
    public function addExperiment($data)
    {
         // Prepare Query
      $this->db->query('INSERT INTO experiments (user_id, name, supervisor, school, course, project_title, lay_summary) 
      VALUES (:user_id, :name, :supervisor, :school, :course, :project_title, :lay_summary)');

      // Bind Values
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':supervisor', $data['supervisor']);
      $this->db->bind(':school', $data['school']);
      $this->db->bind(':course', $data['course']);
      $this->db->bind(':project_title', $data['project_title']);
      $this->db->bind(':lay_summary', $data['lay_summary']);
     
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
      public function updateExperiment($data){
      // Prepare Query
      $this->db->query('UPDATE experiments SET name = :name, supervisor = :supervisor, school = :school, course = :course, project_title = :project_title, lay_summary = :lay_summary WHERE id = :ssssssid');

      // Bind Values
      $this->db->bind(':experiment_id', $data['id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':supervisor', $data['supervisor']);
      $this->db->bind(':school', $data['school']);
      $this->db->bind(':course', $data['course']);
      $this->db->bind(':project_title', $data['project_title']);
      $this->db->bind(':lay_summary', $data['lay_summary']);
   
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getExperimentById($id)
    {
        $this->db->query('SELECT * FROM experiments WHERE id =:id');
        // Bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
    }
    public function deleteExperiment($id)
    { $this->db->query('DELETE FROM experiments WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

