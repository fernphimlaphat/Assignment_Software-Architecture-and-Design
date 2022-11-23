<?php

interface SQLQueryBuilder
{
    public function select(string $table,string $t);

    public function where(string $field, string $value);

	public function and(string $and, string $valueAnd);

	public function innerJoin(string $table, string $t, string $cond1, string $cond2);

	public function update(string $table, string $set, string $value);

	public function orderBy(string $value);
}


class QueryBuilder implements SQLQueryBuilder {
	// for database connection
	private $host;
	private $user;
	private $password;
	private $database;

	private $link = NULL;

	private $query;
	private $result;

	// constructor
	public function __construct($host, $user, $password, $database)
	{
		if (FALSE === ($this->link = mysqli_connect($host, $user, $password, $database))) {
			throw new Exception('Error', mysqli_connect_error());
		}
	}

	public function select($table,$t)
	{
		$this->query = 'SELECT * FROM '.$table.' AS '.$t;
		return $this;
	}

    public function innerJoin($table = NULL, $t = NULL,$cond1= NULL,$cond2= NULL)
	{
		$this->query .= ' INNER JOIN '.$table. ' AS '.$t .' ON '.$cond1. '='.$cond2;
		return $this;
	}

	public function where($where = NULL, $value = NULL)
	{
		$this->query .= ' WHERE '.$where. '='.$value;
		return $this;
	}

	public function and($and = NULL, $value = NULL)
	{
		$this->query .= ' AND '.$and. '='.$value;
		return $this;
	}

	public function update($table = NULL, $set = NULL, $value = NULL)
	{
		$this->query .= 'UPDATE '.$table.' SET '.$set. '='.$value;
		return $this;
	}

	public function orderBy($value = 'id desc')
	{
		$this->query .= ' ORDER BY '.$value;
		return $this;
	}

	// Final method for testing this chaining worked
	public function get()
	{
		$this->result = $this->query;
		return $this->result;
	}

	// Final method return as fetch
	public function fetch()
	{
		if (FALSE === ($this->result = mysqli_query($this->link, $this->query))) {
			throw new Exception('Error Query', $this->query);
		}
		return $this->result;
	}

}
