<?php

/**
 * Created by PhpStorm.
 * User: Sven de Ronde
 * Date: 20-3-2017
 * Time: 21:44
 */
class Repository
{
    private $config;

    public function __construct(mysqli $config) {
        $this->config = $config;
    }

    public function getCompanies() {
        $query = "SELECT company.id, company.name, company.present, company.tag, company.warehouse_number FROM company ORDER BY company.name ASC";

        $mysqli = mysqli_query($this->config, $query);
        $rawCompanyData = [];
        while($row = mysqli_fetch_assoc($mysqli)){
            $rawCompanyData[] = $row;
        }

        $companies = [];
        foreach($rawCompanyData as $company) {
            $categories = $this->getCompanyCategories($company['id']);
            $company['categories'] = $categories;

            $companies[] = $company;
        }
        // return rows.
        return $companies;
    }

    public function getCompanyCategories ($id) {
        $query = "SELECT category.name FROM company_has_category LEFT JOIN company ON company_has_category.company_id = company.id RIGHT JOIN category ON company_has_category.category_id = category.id
                  WHERE company_has_category.company_id = $id";

        $mysqli = mysqli_query($this->config, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($mysqli)){
            $rows[] = $row['name'];
        }
        // return rows.
        return $rows;
    }

    public function search($q) {
        $query = "SELECT DISTINCT company.id, company.name, company.tag, company.warehouse_number, company.present FROM company LEFT JOIN company_has_category ON company.id = company_has_category.company_id RIGHT JOIN category ON company_has_category.category_id = category.id
                  WHERE category.name LIKE '%$q%' OR company.name LIKE '%$q%'";

        $mysqli = mysqli_query($this->config, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($mysqli)){
            $rows[] = $row;
        }

        // return rows.
        return $rows;
    }

    public function getCompanyById($id) {
        $query = "SELECT * FROM company WHERE id = $id";

        $mysqli = mysqli_query($this->config, $query);

        // return rows.
        return mysqli_fetch_assoc($mysqli);
    }

    public function togglePresentStatus($id) {
        $query = "SELECT present FROM company WHERE id = $id";
        $mysqli = mysqli_query($this->config, $query);
        $company = mysqli_fetch_assoc($mysqli);

        $status = ($company['present'] == 1)? 0 : 1;
        var_dump($status);

        $updateQuery = "UPDATE company SET present = '$status' WHERE id = $id ";
        mysqli_query($this->config, $updateQuery);
        return null;
    }
}