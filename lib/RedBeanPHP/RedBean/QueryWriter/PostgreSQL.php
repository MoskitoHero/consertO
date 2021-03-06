<?php
/**
 * RedBean PostgreSQL Query Writer
 * 
 * @file			RedBean/QueryWriter/PostgreSQL.php
 * @description		QueryWriter for the PostgreSQL database system.
 *
 * @author			Gabor de Mooij
 * @license			BSD
 *
 *
 * (c) G.J.G.T. (Gabor) de Mooij
 * This source file is subject to the BSD/GPLv2 License that is bundled
 * with this source code in the file license.txt.
 */
class RedBean_QueryWriter_PostgreSQL extends RedBean_QueryWriter_AQueryWriter implements RedBean_QueryWriter {
	
	/**
	 * DATA TYPE
	 * Integer Data Type
	 * @var integer
	 */
	const C_DATATYPE_INTEGER = 0;

	/**
	 * DATA TYPE
	 * Double Precision Type
	 * @var integer
	 */
	const C_DATATYPE_DOUBLE = 1;

	/**
	 * DATA TYPE
	 * String Data Type
	 * @var integer
	 */
	const C_DATATYPE_TEXT = 3;
	
	
	/**
	 * Special type date for storing date values: YYYY-MM-DD
	 * @var integer
	 */
	const C_DATATYPE_SPECIAL_DATE = 80;
	
	/**
	 * Specified field type cannot be overruled
	 * @var integer
	 */
	const C_DATATYPE_SPECIFIED = 99;
	

	/**
	 * Holds Database Adapter
	 * @var RedBean_DBAdapter
	 */
	protected $adapter;

	/**
	 * character to escape keyword table/column names
	 * @var string
	 */
	protected $quoteCharacter = '"';

	/**
	 * Default Value
	 * @var string
	 */
	protected $defaultValue = 'DEFAULT';
	
	/**
	* This method returns the datatype to be used for primary key IDS and
	* foreign keys. Returns one if the data type constants.
	*
	* @return integer $const data type to be used for IDS.
	*/
	public function getTypeForID() {
		return self::C_DATATYPE_INTEGER;
	}
	
	/**
	 * Returns the insert suffix SQL Snippet
	 *
	 * @param string $table table
	 *
	 * @return  string $sql SQL Snippet
	 */
	protected function getInsertSuffix($table) {
		return "RETURNING id ";
	}

	/**
	 * Constructor
	 * The Query Writer Constructor also sets up the database
	 *
	 * @param RedBean_DBAdapter $adapter adapter
	 */
	public function __construct( RedBean_Adapter_DBAdapter $adapter ) {
		
		
		$this->typeno_sqltype = array(
				  self::C_DATATYPE_INTEGER=>' integer ',
				  self::C_DATATYPE_DOUBLE=>' double precision ',
				  self::C_DATATYPE_TEXT=>' text ',
				  self::C_DATATYPE_SPECIAL_DATE => ' date '
		);

		$this->sqltype_typeno = array();
		foreach($this->typeno_sqltype as $k=>$v)
		$this->sqltype_typeno[trim(strtolower($v))]=$k;
		
		
		$this->adapter = $adapter;
		parent::__construct();
	}

	/**
	 * Returns all tables in the database
	 *
	 * @return array $tables tables
	 */
	public function getTables() {
		return $this->adapter->getCol( "select table_name from information_schema.tables
		where table_schema = 'public'" );
	}

	/**
	 * Creates an empty, column-less table for a bean.
	 *
	 * @param string $table table to create
	 */
	public function createTable( $table ) {
		$table = $this->safeTable($table);
		$sql = " CREATE TABLE $table (id SERIAL PRIMARY KEY); ";
		$this->adapter->exec( $sql );
	}

	/**
	 * Returns an array containing the column names of the specified table.
	 *
	 * @param string $table table to get columns from
	 *
	 * @return array $columns array filled with column (name=>type)
	 */
	public function getColumns( $table ) {
		$table = $this->safeTable($table, true);
		$columnsRaw = $this->adapter->get("select column_name, data_type from information_schema.columns where table_name='$table'");
		foreach($columnsRaw as $r) {
			$columns[$r['column_name']]=$r['data_type'];
		}
		return $columns;
	}

	/**
	 * Returns the pgSQL Column Type Code (integer) that corresponds
	 * to the given value type.
	 *
	 * @param string $value value to determine type of
	 *
	 * @return integer $type type code for this value
	 */
	public function scanType( $value, $flagSpecial=false ) {
		
		$this->svalue=$value;
		
		if ($flagSpecial) {
			if ($value && preg_match('/^\d\d\d\d\-\d\d-\d\d$/',$value)) {
				return RedBean_QueryWriter_PostgreSQL::C_DATATYPE_SPECIAL_DATE;
			}
		}
		
		$sz = ($this->startsWithZeros($value));
		if ($sz) return self::C_DATATYPE_TEXT;
		if ($value===null || ($value instanceof RedBean_Driver_PDO_NULL) ||(is_numeric($value)
				  && floor($value)==$value
				  && $value < 2147483648
				  && $value > -2147483648)) {
			return self::C_DATATYPE_INTEGER;
		}
		elseif(is_numeric($value)) {
			return self::C_DATATYPE_DOUBLE;
		}
		else {
			return self::C_DATATYPE_TEXT;
		}
	}

	/**
	 * Returns the Type Code for a Column Description
	 *
	 * @param string $typedescription type description to get code for
	 *
	 * @return integer $typecode type code
	 */
	public function code( $typedescription ) {
		$r = ((isset($this->sqltype_typeno[$typedescription])) ? $this->sqltype_typeno[$typedescription] : 99);
		if ($r > self::C_DATATYPE_SPECIFIED) return self::C_DATATYPE_SPECIFIED;
		return $r;
	}

	/**
	 * This method upgrades the column to the specified data type.
	 * This methods accepts a type and infers the corresponding table name.
	 *
	 * @param string  $type       type / table that needs to be adjusted
	 * @param string  $column     column that needs to be altered
	 * @param integer $datatype   target data type
	 *
	 * @return void
	 */
	public function widenColumn( $type, $column, $datatype ) {
		$table = $type;
		$type = $datatype;
		$table = $this->safeTable($table);
		$column = $this->safeColumn($column);
		$newtype = $this->typeno_sqltype[$type];
		$changecolumnSQL = "ALTER TABLE $table \n\t ALTER COLUMN $column TYPE $newtype ";
		$this->adapter->exec( $changecolumnSQL );
	}

	/**
	 * Adds a Unique index constrain to the table.
	 *
	 * @param string $table table to add index to
	 * @param string $col1  column to be part of index
	 * @param string $col2  column 2 to be part of index
	 *
	 * @return void
	 */
	public function addUniqueIndex( $table,$columns ) {
		$table = $this->safeTable($table, true);
		sort($columns); //else we get multiple indexes due to order-effects
		foreach($columns as $k=>$v) {
			$columns[$k]=$this->safeColumn($v);
		}
		$r = $this->adapter->get("SELECT
									i.relname as index_name
								FROM
									pg_class t,
									pg_class i,
									pg_index ix,
									pg_attribute a
								WHERE
									t.oid = ix.indrelid
									AND i.oid = ix.indexrelid
									AND a.attrelid = t.oid
									AND a.attnum = ANY(ix.indkey)
									AND t.relkind = 'r'
									AND t.relname = '$table'
								ORDER BY  t.relname,  i.relname;");

		$name = "UQ_".sha1($table.implode(',',$columns));
		if ($r) {
			foreach($r as $i) {
				if (strtolower( $i['index_name'] )== strtolower( $name )) {
					return;
				}
			}
		}
		$sql = "ALTER TABLE \"$table\"
                ADD CONSTRAINT $name UNIQUE (".implode(",",$columns).")";
		$this->adapter->exec($sql);
	}

	/**
	 * Given an Database Specific SQLState and a list of QueryWriter
	 * Standard SQL States this function converts the raw SQL state to a
	 * database agnostic ANSI-92 SQL states and checks if the given state
	 * is in the list of agnostic states.
	 *
	 * @param string $state state
	 * @param array  $list  list of states
	 *
	 * @return boolean $isInArray whether state is in list
	 */
	public function sqlStateIn($state, $list) {
		$stateMap = array(
			'42P01'=>RedBean_QueryWriter::C_SQLSTATE_NO_SUCH_TABLE,
			'42703'=>RedBean_QueryWriter::C_SQLSTATE_NO_SUCH_COLUMN,
			'23505'=>RedBean_QueryWriter::C_SQLSTATE_INTEGRITY_CONSTRAINT_VIOLATION
		);
		return in_array((isset($stateMap[$state]) ? $stateMap[$state] : '0'),$list);
	}

	/**
	 * Adds a foreign key to a table. The foreign key will not have any action; you
	 * may configure this afterwards.
	 *
	 * @param  string $type        type you want to modify table of
	 * @param  string $targetType  target type
	 * @param  string $field       field of the type that needs to get the fk
	 * @param  string $targetField field where the fk needs to point to
	 *
	 * @return bool $success whether an FK has been added
	 */
	public function addFK( $type, $targetType, $field, $targetField) {
		try{
			$table = $this->safeTable($type);
			$column = $this->safeColumn($field);
			$tableNoQ = $this->safeTable($type,true);
			$columnNoQ = $this->safeColumn($field,true);
			$targetTable = $this->safeTable($targetType);
			$targetColumn  = $this->safeColumn($targetField);
			$fkCode = $tableNoQ.'_'.$columnNoQ.'_fkey';
			$sql = "
						SELECT
								c.oid,
								n.nspname,
								c.relname,
								n2.nspname,
								c2.relname,
								cons.conname
						FROM pg_class c
						JOIN pg_namespace n ON n.oid = c.relnamespace
						LEFT OUTER JOIN pg_constraint cons ON cons.conrelid = c.oid
						LEFT OUTER JOIN pg_class c2 ON cons.confrelid = c2.oid
						LEFT OUTER JOIN pg_namespace n2 ON n2.oid = c2.relnamespace
						WHERE c.relkind = 'r'
						AND n.nspname IN ('public')
						AND (cons.contype = 'f' OR cons.contype IS NULL)
						AND
						(  cons.conname = '{$fkCode}' )

					  ";
			$rows = $this->adapter->get( $sql );
			if (!count($rows)) {
				$this->adapter->exec("ALTER TABLE  $table
					ADD FOREIGN KEY (  $column ) REFERENCES  $targetTable (
					$targetColumn) ON DELETE SET NULL ON UPDATE SET NULL DEFERRABLE ;");
					return true;
				
			}
		}
		catch(Exception $e){ return false; }
	}



	/**
	 * Add the constraints for a specific database driver: PostgreSQL.
	 * @todo Too many arguments; find a way to solve this in a neater way.
	 *
	 * @param string			  $table     table
	 * @param string			  $table1    table1
	 * @param string			  $table2    table2
	 * @param string			  $property1 property1
	 * @param string			  $property2 property2
	 *
	 * @return boolean $succes whether the constraint has been applied
	 */
	protected function constrain($table, $table1, $table2, $property1, $property2) {
		try{
			$writer = $this;
			$adapter = $this->adapter;
			$fkCode = "fk".md5($table.$property1.$property2);
			$sql = "
						SELECT
								c.oid,
								n.nspname,
								c.relname,
								n2.nspname,
								c2.relname,
								cons.conname
						FROM pg_class c
						JOIN pg_namespace n ON n.oid = c.relnamespace
						LEFT OUTER JOIN pg_constraint cons ON cons.conrelid = c.oid
						LEFT OUTER JOIN pg_class c2 ON cons.confrelid = c2.oid
						LEFT OUTER JOIN pg_namespace n2 ON n2.oid = c2.relnamespace
						WHERE c.relkind = 'r'
						AND n.nspname IN ('public')
						AND (cons.contype = 'f' OR cons.contype IS NULL)
						AND
						(  cons.conname = '{$fkCode}a'	OR  cons.conname = '{$fkCode}b' )

					  ";

			$rows = $adapter->get( $sql );
			if (!count($rows)) {
				$sql1 = "ALTER TABLE \"$table\" ADD CONSTRAINT
						  {$fkCode}a FOREIGN KEY ($property1)
							REFERENCES \"$table1\" (id) ON DELETE CASCADE ";
				$sql2 = "ALTER TABLE \"$table\" ADD CONSTRAINT
						  {$fkCode}b FOREIGN KEY ($property2)
							REFERENCES \"$table2\" (id) ON DELETE CASCADE ";
				$adapter->exec($sql1);
				$adapter->exec($sql2);
			}
			return true;
		}
		catch(Exception $e){ return false; }
	}

	/**
	 * Removes all tables and views from the database.
	 */
	public function wipeAll() {
      	$this->adapter->exec("SET CONSTRAINTS ALL DEFERRED");
      	foreach($this->getTables() as $t) {
      		$t = $this->noKW($t);
	 		try{
	 			$this->adapter->exec("drop table if exists $t CASCADE ");
	 		}
	 		catch(Exception $e){  }
	 		try{
	 			$this->adapter->exec("drop view if exists $t CASCADE ");
	 		}
	 		catch(Exception $e){  throw $e; }
		}
		$this->adapter->exec("SET CONSTRAINTS ALL IMMEDIATE");
	}

}
