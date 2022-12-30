<?php
/**
 * Paginator
 * 
 * Data for selecting a page of records
 */
class Paginator
{
    /**
     * Number of records to return
     * @var integer
     * 
     * Number of page to skip before the page
     * @var integer
     * 
     * Previous page number
     * @var integer
     * 
     * Next page number
     * @var integer
     */
    public $limit;
    public $offset;
    public $previous;
    public $next;

    /**
     * Constructor
     * 
     * @param integer $page Page number
     * @param integer $records_per_page Number of records per page
     * 
     * @return void
     */

    public function __construct($page, $records_per_page, $total_records)
    {
        $this->limit = $records_per_page;

        //this filter transform string number to a number, with options string to default 1
        $page = filter_var($page, FILTER_VALIDATE_INT, [
            'options' => [
                //random string transform to 1
                'default' => 1,
                //negative number string transform to 1
                'min_range' => 1
            ]
        ]);

        if ($page > 1) {
            $this->previous = $page - 1;
        }

        $max_number_pages = ceil($total_records / $records_per_page);

        if ($page < $max_number_pages) {
            $this->next = $page + 1;
        }

        $this->offset = $records_per_page * ($page - 1);
    }
}