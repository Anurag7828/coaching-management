<?php



class CommonModal extends CI_Model

{
    public function get_products_by_stock_place($stock_place_id) {
    // Select distinct product names to ensure no duplicates
    $this->db->select('DISTINCT(purchase_product.product_name) as pro_id, product.product_name');
    $this->db->from('purchase_product');
    $this->db->join('product', 'product.id = purchase_product.product_name');
    $this->db->where('purchase_product.stock_place_name', $stock_place_id);
    
    $query = $this->db->get();
    return $query->result_array();
}


    // Fetch all products by joining purchase_product and product tables
    public function get_all_products() {
        $this->db->select('purchase_product.p_id, product.product_name,purchase_product.packing,purchase_product.unit');
        $this->db->from('purchase_product');
        $this->db->join('product', 'product.id = purchase_product.product_name');
        
        $query = $this->db->get();
        return $query->result_array();
    }
public function getStockByPlaceAndProduct($stockPlaceId, $productId)
{
    $this->db->select('*'); // Adjust fields as necessary
    $this->db->from('purchase_product');
    $this->db->where('stock_place_name', $stockPlaceId);
    $this->db->where('product_name', $productId); // Assuming you have a column for product ID
    return $this->db->get()->result_array();
}

	public function insertRow($table, $post)

	{

		$clean_post = $this->security->xss_clean($post);

		return $this->db->insert($table, $clean_post);

	}



	function insertRowReturnId($table, $post)

	{

		$clean_post = $this->security->xss_clean($post);

		$this->db->insert($table, $clean_post);

		return $this->db->insert_id();

	}



	function insertRowReturnIdWithClean($table, $post)

	{

		$this->db->insert($table, $post);

		return $this->db->insert_id();

	}



	function insertRowInBatch($table, $post)

	{

		$clean_post = $this->security->xss_clean($post);

		return $this->db->insert_batch($table, $clean_post);

	}
    public function getRowsWithStatusesOrdered($table, $column, $statuses, $orderByColumn, $orderDirection) {
        $this->db->select('*'); // Select all columns
        $this->db->from($table); // Table name
        $this->db->where_in($column, $statuses); // Include statuses 0 and 1
        $this->db->order_by($orderByColumn, $orderDirection); // Order by column
        $query = $this->db->get(); // Execute the query
        return $query->result_array(); // Return result as an array
    }
public function getRowsWithStatusesOrderedbyId(
		$table, 
		$column, 
		$statuses, 
		$orderByColumn, 
		$orderDirection, 
		$branch= null, 
		$branch_id = null, 
		$userColumn = null, 
		$userId = null
	) {
		$this->db->select('*'); // Select all columns
		$this->db->from($table); // Table name
		$this->db->where_in($column, $statuses); // Include statuses 0 and 1
	
		// Add branch_id condition if provided
		if ($branch_id !== null) {
			$this->db->where($branch, $branch_id);
		}
	
		// Add user_id condition if provided
		if ($userColumn !== null && $userId !== null) {
			$this->db->where($userColumn, $userId);
		}
	
		$this->db->order_by($orderByColumn, $orderDirection); // Order by column
		$query = $this->db->get(); // Execute the query
		return $query->result_array(); // Return result as an array
	}

function updateColumnValue($table, $whereColumn, $whereValue, $updateColumn, $updateValue) {
    // Prepare the data to be updated
    $data = [$updateColumn => $updateValue];

    // Clean the input data to prevent XSS attacks
    $clean_data = $this->security->xss_clean($data);

    // Set the new value for the specified column
    $this->db->set($clean_data);

    // Where clause to find the specific row
    $this->db->where($whereColumn, $whereValue);

    // Execute the update query
    $this->db->update($table);

    // Check if any rows were affected and return the appropriate response
    return $this->db->affected_rows() > 0;
}

	function updateRowById($table, $column, $id, $data)

	{

		$clean_post = $this->security->xss_clean($data);

		$this->db->set($clean_post)

			->where($column, $id)

			->update($table);

		if ($this->db->affected_rows() > 0) {

			return true;

		} else {

			return false;

		}

	}



	function updateRowByMoreId($table, $where, $data)

	{

		$clean_post = $this->security->xss_clean($data);

		$this->db->set($clean_post)

			->where($where)

			->update($table);

		if ($this->db->affected_rows() > 0) {

			return true;

		} else {

			return false;

		}

	}



	public function getAllRows($table)

	{

		$get = $this->db->select()

			->from($table)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}

	public function getAllRowsWithLimit($table, $limit, $orderCol)

	{

		$get = $this->db->select()

			->from($table)

			->limit($limit)

			->order_by($orderCol, "desc")

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}

	public function getRowRandomly($table, $limit)

	{

		$get = $this->db->select()

			->from($table)

			->limit($limit)

			// ->order_by($orderCol, "desc")

			->order_by('rand()')

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}



	public function getAllRowsInOrder($table, $orderColumn, $orderType)

	{

		$get = $this->db->select()

			->from($table)

			->order_by($orderColumn, $orderType)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}

	public function getAllRowsInOrderWithLimit($table, $limit, $orderColumn, $orderType)

	{

		$get = $this->db->select()

			->from($table)

			->limit($limit)

			->order_by($orderColumn, $orderType)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}






public function getRowsAfterId($table, $column, $id, $column1, $id1)
{
    $get = $this->db->select()
        ->from($table)
        ->where("$column >", $id) // ID ke baad ka data fetch karega
                ->where("$column1 ", $id1) // ID ke baad ka data fetch karega
        ->get();

    if ($get->num_rows() > 0) {
        return $get->result_array();
    } else {
        return false;
    }
}
public function getRowsBeforeId($table, $column, $id, $column1, $id1)
{
    $get = $this->db->select()
        ->from($table)
        ->where("$column <", $id) // ID ke baad ka data fetch karega
                ->where("$column1 ", $id1) // ID ke baad ka data fetch karega
                   ->order_by($column, 'DESC') // Sort by ID in descending order
        ->limit(1)     
        ->get();

    if ($get->num_rows() > 0) {
        return $get->result_array();
    } else {
        return false;
    }
}
	public function getRowById($table, $column, $id)

	{

		$get = $this->db->select()

			->from($table)

			->where($column, $id)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}
	public function getRowByMultitpleId($table, $column1, $value1, $column2 = null, $value2 = null, $column3 = null, $value3 = null) {
    $this->db->select('*'); // Select all columns
    $this->db->from($table); // Table name
    $this->db->where($column1, $value1); // First condition

    // Add second condition if provided
    if ($column2 !== null && $value2 !== null) {
        $this->db->where($column2, $value2);
        
    }
    if (!empty($column3) && !empty($value3)) {
        $this->db->where($column3, $value3);
    }
    $query = $this->db->get(); // Execute the query
    return $query->result_array(); // Return the result as an array
}
	public function getRowByIdSum($table, $column1, $value1, $column2 = null, $value2 = null, $sum_column = null)
{
    // Start the query
    $this->db->select('*');  // Select all columns by default

    // If a sum column is provided, add the SUM() function
    if ($sum_column) {
        $this->db->select('SUM(' . $sum_column . ') as total_sum');
    }

    // From the table and filter by the provided column and value
    $this->db->from($table)
             ->where($column1, $value1); // First condition

    // Add the second condition if provided
    if (!empty($column2) && !empty($value2)) {
        $this->db->where($column2, $value2); // Second condition
    }

    // Group by the first column if a sum column is provided
    if ($sum_column) {
        $this->db->group_by($column1);
    }

    // Execute the query
    $get = $this->db->get();

    // Check if we have results
    if ($get->num_rows() > 0) {
        return $get->result_array();  // Return the result array, including the sum if provided
    } else {
        return false;
    }
}

public function getRowByIdSumTotal($table, $column1, $value1, $column2 = null, $value2 = null, $sum_column = null,$code)
{
    // Start the query
    $this->db->select('*');  // Select all columns by default

    // If a sum column is provided, add the SUM() function
    if ($sum_column) {
        $this->db->select('SUM(' . $sum_column . ') as total');
    }

    // From the table and filter by the provided column and value
    $this->db->from($table)
             ->where($column1, $value1); // First condition

    // Add the second condition if provided
    if (!empty($column2) && !empty($value2)) {
        $this->db->where($column2, $value2); // Second condition
    }

    // Group by the first column if a sum column is provided
    if ($sum_column) {
        $this->db->group_by($code);
    }

    // Execute the query
    $get = $this->db->get();

    // Check if we have results
    if ($get->num_rows() > 0) {
        return $get->result_array();  // Return the result array, including the sum if provided
    } else {
        return false;
    }
}
public function getRowByIdOrderByLimit3($table, $column1, $value1, $column2 = null, $value2 = null,$column3 = null, $value3 = null, $order_by = null, $order_direction = 'ASC', $limit = null)
{
    // Start the query
    $this->db->select()
             ->from($table)
             ->where($column1, $value1);
              // First condition

    // Apply second condition if provided
    if (!empty($column2) && !empty($value2)) {
        $this->db->where($column2, $value2);
    }
    if (!empty($column3) && !empty($value3)) {
        $this->db->where($column3, $value3);
    }
    // Apply order by if provided
    if (!empty($order_by)) {
        $this->db->order_by($order_by, $order_direction);
    }

    // Apply limit if provided
    if (!empty($limit)) {
        $this->db->limit($limit);
    }

    // Execute the query
    $get = $this->db->get();

    // Check for results
    if ($get->num_rows() > 0) {
        return $get->result_array();
    } else {
        return false;
    }
}
public function getRowByIdOrderByLimit($table, $column1, $value1, $column2 = null, $value2 = null,$order_by = null, $order_direction = 'ASC', $limit = null)
{
    // Start the query
    $this->db->select()
             ->from($table)
             ->where($column1, $value1);
              // First condition

    // Apply second condition if provided
    if (!empty($column2) && !empty($value2)) {
        $this->db->where($column2, $value2);
    }
    
    // Apply order by if provided
    if (!empty($order_by)) {
        $this->db->order_by($order_by, $order_direction);
    }

    // Apply limit if provided
    if (!empty($limit)) {
        $this->db->limit($limit);
    }

    // Execute the query
    $get = $this->db->get();

    // Check for results
    if ($get->num_rows() > 0) {
        return $get->result_array();
    } else {
        return false;
    }
}
public function getRowByIdSumDue($table, $column1, $value1, $column2 = null, $value2 = null, $sum_column, $code)
{
    $this->db->select('SUM(' . $sum_column . ') AS total_due');
    $this->db->from($table);
    $this->db->where($column1, $value1);
    
    // Only add the second condition if it's not null
    if ($column2 && $value2) {
        $this->db->where($column2, $value2);
    }
    
    // Add the subquery for the last rows
    $this->db->where('id IN (
        SELECT MAX(id) 
        FROM ' . $table . ' 
        WHERE ' . $column1 . ' = ' . $this->db->escape($value1) . ' 
        ' . ($column2 ? 'AND ' . $column2 . ' = ' . $this->db->escape($value2) : '') . ' 
        GROUP BY ' . $code . '
    )', NULL, FALSE);
    
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row()->total_due; // Return the total due amount
    } else {
        return 0; // Return 0 if no records found
    }
}







	public function getRowByOr($table, $where, $or_where)

	{

		$get = $this->db->select()

			->from($table)

			->group_start()

			->where($where)

			->or_where($or_where)

			->group_end()

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}

	public function getRowByIdWithLimit($table, $column, $id, $limit)

	{

		$get = $this->db->select()

			->from($table)

			->where($column, $id)

			->limit($limit)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}



	function getDataByIdInOrderLimit($table, $where, $orderColumn, $orderType, $limit)

	{

		$get = $this->db->select()

			->from($table)

			->where($where)

			->limit($limit)

			->order_by($orderColumn, $orderType)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}

	function getAllDataWithLimitInOrder($table, $orderColumn, $orderType, $start, $end)

	{

		$get = $this->db->select()

			->from($table)

			->limit($start, $end)

			->order_by($orderColumn, $orderType)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}



	public function getRowByIdInOrder($table, $where, $orderColumn, $orderType)

	{

		$get = $this->db->select()

			->from($table)

			->where($where)

			->order_by($orderColumn, $orderType)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}





	public function getRowByMoreId($table, $where)

	{

		$get = $this->db->select()

			->from($table)

			->where($where)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}


public function getLastRow($table, $field, $coloumn,$user_id) {
    // This will get the last inserted row for a specific user by ordering by the specified field in descending order
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($coloumn, $user_id); // Add the user_id condition
    $this->db->order_by($field, 'DESC');
    $this->db->limit(1); // Limit to one row

    $query = $this->db->get();

    // Check if a row exists and return it, else return null
    if ($query->num_rows() > 0) {
        return $query->row_array(); // Return the result as an associative array
    } else {
        return null; // No rows found
    }
}
	public function get_invoice_by_id($invoice_id,$table,$column) {
        $this->db->where($column, $invoice_id); // Assuming the primary key is 'id'
        $query = $this->db->get($table); // Your table name
        return $query->row_array(); // Return as associative array
    }
	public function getSingleRowById($table, $where)

	{

		$get = $this->db->select()

			->from($table)

			->where($where)

			->get();

		if ($get->num_rows() > 0) {

			return $get->row_array();

		} else {

			return false;

		}

	}



	public function deleteRowById($table, $where)

	{

		return $this->db->where($where)->delete($table);

	}

	public function deleteRowByuserId($table, $where, $user)
{
    // Adding the additional condition for user_id
    return $this->db->where($where)->where($user)->delete($table);
}

	public function getNumRow($table)

	{

		$ci = &get_instance();

		$get = $ci->db->select()

			->from($table)

			->get();

		return $get->num_rows();

	}

	public function getNumRows($table, $where)

	{

		$ci = &get_instance();

		$get = $ci->db->select()

			->from($table)

			->where($where)

			->get();

		return $get->num_rows();

	}
	public function getNumWhereRows($table, $column,$status)
	{
		// Assuming you are using CodeIgniter's Query Builder
		$this->db->from($table);
		$this->db->where($column, $status); // Filter by status
		return $this->db->count_all_results(); // Get count of rows
	}

	public function getRowByIdDesc($table, $column, $value, $column2 = null, $order = 'ASC') {
		$this->db->where($column, $value);
		if ($column2) {
			$this->db->order_by($column2, $order); // Dynamic ordering
		}
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function getColumnById($selectColumn, $table, $where)

	{

		$get = $this->db->select($selectColumn)

			->from($table)

			->where($where)

			->get();

		if ($get->num_rows() > 0) {

			return $get->row_array();

		} else {

			return false;

		}

	}



	public function getRowByLikeInOrder($table, $where, $like, $name, $orderBy, $orderType)

	{

		$ci = &get_instance();

		$get = $ci->db->select()

			->from($table)

			->where($where)

			->like($like, $name, 'both')

			->order_by($orderBy, $orderType)

			->get();

		if ($get->num_rows() > 0) {

			return $get->result_array();

		} else {

			return false;

		}

	}

	public function runQuery($query)

	{

		$query = $this->db->query($query);

		if ($query->num_rows() > 0) {

			return $query->result_array();

		} else {

			return false;

		}

	}
	public function getPackingOptionsByProductId($product_id, $column, $table)
    {
    $this->db->select($column); // Select the specified column
    $this->db->from($table);
    $this->db->where('product_name', $product_id); // Use p_id for filtering instead of product_name
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return array_column($query->result_array(), $column); // Return packing options as an array
    } else {
        return []; // Return an empty array if no options found
    }
   }

public function getRowByCondition($table, $condition)
{
    return $this->db->get_where($table, $condition)->row_array();
}

public function searchProductsByName($searchTerm, $uid) {
    // Validate inputs
    if (empty($searchTerm) || empty($uid)) {
        return []; // Return an empty array if parameters are invalid
    }

    // Build the query
    $this->db->like('product_name', $searchTerm); // Search by product name
    $this->db->where('user_id', $uid); // Match user ID
    $query = $this->db->get('product');

    // Return results
    return $query->result_array();
}


 // Fetch low stock items
public function getLowStockItems($threshold, $tid)
{
    $this->db->select('purchase_product.stock_place_name, 
                       purchase_product.product_name, 
                       purchase_product.quantity, 
                       purchase_product.availabile_quantity, 
                       purchase_product.exp_date');
    $this->db->from('purchase_product');
    $this->db->where('purchase_product.availabile_quantity <=', $threshold);
    $this->db->where('purchase_product.user_id', $tid);  // Correctly checks user_id for the provided $tid
    return $this->db->get()->result_array();
}
    // Fetch purchase payment data with vendor name
 // Fetch purchase payment data with vendor name
public function getPurchasePayments($uid)
{
    $this->db->select('purchase_payment.purchase_code, 
                       vender.vender_name, 
                       purchase_payment.paid, 
                       purchase_payment.due, 
                       MAX(purchase_payment.date) as date,  
                       MAX(purchase_payment.total) as total');
    $this->db->from('purchase_payment');
    $this->db->join('vender', 'purchase_payment.vender_id = vender.id', 'left');
    $this->db->where('purchase_payment.user_id', $uid); // Added user_id condition
    $this->db->group_by('purchase_payment.purchase_code, vender.vender_name');
    return $this->db->get()->result_array();
}

// Fetch return purchase payment data with vendor name
public function getReturnPurchasePayments($uid)
{
    $this->db->select('return_purchase_payment.return_code, 
                       vender.vender_name, 
                       return_purchase_payment.paid, 
                       return_purchase_payment.due, 
                       MAX(return_purchase_payment.date) as date,  
                       MAX(return_purchase_payment.total) as total');
    $this->db->from('return_purchase_payment');
    $this->db->join('vender', 'return_purchase_payment.vender_id = vender.id', 'left');
    $this->db->where('return_purchase_payment.user_id', $uid); // Added user_id condition
    $this->db->group_by('return_purchase_payment.return_code, vender.vender_name');
    return $this->db->get()->result_array();
}

// Fetch invoice payment data with customer name
public function getInvoicePayments($uid)
{
    $this->db->select('payment.invoice_no, 
                       customer.name, 
                       payment.paid, 
                       payment.due, 
                       MAX(payment.date) as date,  
                       MAX(payment.total) as total');
    $this->db->from('payment');
    $this->db->join('customer', 'payment.customer_id = customer.id', 'left');
    $this->db->where('payment.user_id', $uid); // Added user_id condition
    $this->db->group_by('payment.invoice_no, customer.name');
    return $this->db->get()->result_array();
}

// Fetch return invoice payment data with customer name
public function getReturnInvoicePayments($uid)
{
    $this->db->select('return_invoice_payment.return_invoice_no, 
                       customer.name AS customer_name, 
                       SUM(return_invoice_payment.paid) AS paid, 
                       SUM(return_invoice_payment.due) AS due, 
                       MAX(return_invoice_payment.date) AS date,  
                       MAX(return_invoice_payment.total) AS total');
    $this->db->from('return_invoice_payment');
    $this->db->join('customer', 'return_invoice_payment.customer_id = customer.id', 'left');
    $this->db->where('return_invoice_payment.user_id', $uid); // Added user_id condition
    $this->db->group_by('return_invoice_payment.return_invoice_no, customer.name');
    return $this->db->get()->result_array();
}

// Fetch invoices with product counts and customer names
public function getInvoices($uid)
{
    $this->db->select('
        invoice.invoice_no, 
        invoice.status AS stat, 
        invoice.customer_name AS c_id, 
        invoice.date AS bill_date, 
        customer.name AS customer_name, 
        COUNT(*) AS product_count, 
        invoice.final_total AS final_total
    ');
    $this->db->from('invoice');
    $this->db->join('customer', 'customer.id = invoice.customer_name', 'left');
    $this->db->where('invoice.user_id', $uid); // Added user_id condition
    $this->db->group_by(['invoice.invoice_no', 'customer.name']);
    $this->db->order_by('invoice.id', 'DESC'); // Sort by latest invoice first
    $this->db->limit(5); // Limit results to 5
    return $this->db->get()->result_array();
}

// Fetch stock places
public function getStockPlaces($uid)
{
    $this->db->select('id, place_name');
    $this->db->from('stock_place');
    $this->db->where('stock_place.user_id', $uid); // Added user_id condition
    return $this->db->get()->result_array();
}

// Fetch product list
public function getProductList($uid)
{
    $this->db->select('id, product_name');
    $this->db->from('product');
    $this->db->where('product.user_id', $uid); // Added user_id condition
    return $this->db->get()->result_array();
}

// Fetch expired products
public function getExpiredProducts($uid)
{
    $this->db->select('product.product_name, stock_place.place_name as stock_place_name, purchase_product.exp_date, purchase_product.selling_price, purchase_product.quantity,purchase_product.packing, purchase_product.unit, purchase_product.availabile_quantity');
    $this->db->from('purchase_product');
    $this->db->join('product', 'purchase_product.product_name = product.id', 'left');
    $this->db->join('stock_place', 'purchase_product.stock_place_name = stock_place.id', 'left');
    $this->db->where('purchase_product.exp_date <', date('Y-m-d'));
    $this->db->where('purchase_product.user_id', $uid); // Added user_id condition
    $query = $this->db->get();
    return $query->result_array();
}
public function getExpiredProductsbetween($uid,$startdate,$enddate,$stock)
{
    $this->db->select('product.product_name, stock_place.place_name as stock_place_name, purchase_product.exp_date, purchase_product.selling_price, purchase_product.quantity, purchase_product.packing, purchase_product.unit, purchase_product.availabile_quantity');
    $this->db->from('purchase_product');
    $this->db->join('product', 'purchase_product.product_name = product.id', 'left');
    $this->db->join('stock_place', 'purchase_product.stock_place_name = stock_place.id', 'left');
    $this->db->where('purchase_product.exp_date >=', $startdate);
    $this->db->where('purchase_product.exp_date <=', $enddate);
    $this->db->where('purchase_product.stock_place_name', $stock);

    
    $this->db->where('purchase_product.user_id', $uid); // Added user_id condition
    $query = $this->db->get();
    return $query->result_array();
}
// Fetch top selling products
public function getTopSellingProducts($uid)
{
    $this->db->select('
        purchase_product.p_id, 
        product.product_name, 
        purchase_product.exp_date, 
        stock_place.place_name AS stock_place_name, 
        purchase_product.selling_price
    ');
    $this->db->from('purchase_product');
    $this->db->join('product', 'purchase_product.p_id = product.id', 'left');
    $this->db->join('stock_place', 'purchase_product.stock_place_name = stock_place.id', 'left');
    $this->db->where('purchase_product.user_id', $uid); // Added user_id condition
    $this->db->group_by('purchase_product.p_id, product.product_name, purchase_product.exp_date, purchase_product.stock_place_name');
    $this->db->having('COUNT(purchase_product.p_id) >=', 5);
    $query = $this->db->get();
    return $query->result_array();
}

public function get_purchases_between_dates($table, $id, $uid, $user, $start_date, $end_date, $datecoloumn, $grand, $discount, $tax) {
    // Raw SQL with CTE (window function with ROW_NUMBER logic)
    $sql = "
    WITH ranked_rows AS (
        SELECT *,
               ROW_NUMBER() OVER(PARTITION BY $id ORDER BY $id DESC) AS rn
        FROM $table
        WHERE $uid = ? 
            AND $datecoloumn >= ? 
            AND $datecoloumn <= ?
    )
    SELECT *,
        SUM($grand) AS total_grand_total, 
        SUM($discount) AS total_discount, 
        SUM($tax) AS total_tax
    FROM ranked_rows
    WHERE rn = 1;";

    // Execute query with bindings to prevent SQL injection
    $query = $this->db->query($sql, [$user, $start_date, $end_date]);
    
    return $query->row_array();
}
public function get_purchases_between_dates_payment($table, $id, $uid, $user, $start_date, $end_date, $datecoloumn,  $discount, $tax) {
    // Raw SQL with CTE (window function with ROW_NUMBER logic)
    $sql = "
    WITH ranked_rows AS (
        SELECT *,
               ROW_NUMBER() OVER(PARTITION BY $id ORDER BY $datecoloumn DESC, id DESC) AS rn
        FROM $table
        WHERE $uid = ? 
            AND $datecoloumn >= ? 
            AND $datecoloumn <= ?
    )
    SELECT 
        
        SUM($tax) AS total_tax,
        (SELECT SUM($discount) 
         FROM $table 
         WHERE $uid = ? 
            AND $datecoloumn >= ? 
            AND $datecoloumn <= ?) AS grand_total_paid_amount 
    FROM ranked_rows
    WHERE rn = 1;
    ";

    // Execute query with bindings to prevent SQL injection
    $query = $this->db->query($sql, [$user, $start_date, $end_date, $user, $start_date, $end_date]);
    
    return $query->row_array();
}


public function get_grand_total($table, $id, $uid, $user, $start_date, $end_date, $datecoloumn, $grand) {
    // Raw SQL with CTE (window function with ROW_NUMBER logic)
    $sql = "
    WITH ranked_rows AS (
        SELECT $grand,
               ROW_NUMBER() OVER(PARTITION BY $id ORDER BY $id DESC) AS rn
        FROM $table
        WHERE $uid = ? 
            AND $datecoloumn >= ? 
            AND $datecoloumn <= ?
    )
    SELECT 
        SUM($grand) AS total_grand_total 
      
    FROM ranked_rows
    WHERE rn = 1;";

    // Execute query with bindings to prevent SQL injection
    $query = $this->db->query($sql, [$user, $start_date, $end_date]);
    
    return $query->row_array();
}

public function get_invoices($table, $invoice, $countcoloumn, $usercloumn, $user_id, $datecoloumn, $start_date, $end_date, $customercoloumn, $customer_id) {
    $this->db->select("*,$table.$invoice, COUNT($table.$countcoloumn) as p_name_count");
    $this->db->from($table);
    
    // Apply conditions
    $this->db->where($usercloumn, $user_id);
    $this->db->where($customercoloumn, "$customer_id");
    $this->db->where("$datecoloumn >=", $start_date);
    $this->db->where("$datecoloumn <=", $end_date);
    
    // Group by invoice_number
    $this->db->group_by("$table.$invoice");
    
    // Order by $invoice
    $this->db->order_by("$table.$invoice", "ASC");

    // Execute the query
    $query = $this->db->get();
    
    return $query->result_array();
}
public function get_invoicess($table, $invoice, $countcoloumn, $usercloumn, $user_id, $datecoloumn, $start_date, $end_date, $customercoloumn, $customer_id) {
    $this->db->select("*,$table.$invoice, COUNT($table.$countcoloumn) as p_name_count");
    $this->db->from($table);
    
    // Apply conditions
    $this->db->where($usercloumn, $user_id);
    $this->db->where($customercoloumn, "$customer_id");
    $this->db->where("$datecoloumn >=", "$start_date");
    $this->db->where("$datecoloumn <=", "$end_date");
    
    // Group by invoice_number
    $this->db->group_by("$table.$invoice");
    
    // Order by $invoice
    $this->db->order_by("$table.$invoice", "ASC");

    // Execute the query
    $query = $this->db->get();
    
    return $query->result_array();
}
public function get_expense($table,  $usercloumn, $user_id, $datecoloumn, $start_date, $end_date) {
    $this->db->select("*");
    $this->db->from($table);
    
    // Apply conditions
    $this->db->where($usercloumn, $user_id);
 
    $this->db->where("$datecoloumn >=", $start_date);
    $this->db->where("$datecoloumn <=", $end_date);
   
    
    // Order by $invoice
    // $this->db->order_by('id', "ASC");

    // Execute the query
    $query = $this->db->get();
    
    return $query->result_array();
}

public function getPurchasePaymentsdate($table, $codeColumn, $userColumn, $user_id, $dateColumn, $start_date, $end_date)
{
    // Subquery
    $subquery = "
        SELECT {$codeColumn}, MAX(id) as max_id, SUM(paid) as total_paid
        FROM {$table}
        WHERE {$userColumn} = ?
          AND {$dateColumn} >= ?
          AND {$dateColumn} <= ?
        GROUP BY {$codeColumn}
    ";

    // Main Query
    $query = "
        SELECT {$table}.*, latest.total_paid as paid
        FROM ({$subquery}) latest
        INNER JOIN {$table}
        ON {$table}.{$codeColumn} = latest.{$codeColumn}
           AND {$table}.id = latest.max_id
    ";

    return $this->db->query($query, [$user_id, $start_date, $end_date])->result_array();
}



}

