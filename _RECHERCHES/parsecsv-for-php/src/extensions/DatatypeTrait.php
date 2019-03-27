<?php

namespace ParseCsv\extensions;

trait DatatypeTrait {

    /**
     * Datatypes
     * Datatypes of CSV data-columns
     *
     * @access public
     * @var array
     */
    public $data_types = [];

    /**
     * Check data type for one column.
     * Check for most commonly data type for one column.
     *
     * @access private
     *
     * @param  array $datatypes
     *
     * @return string|false
     */
    private function getMostFrequentDatatypeForColumn($datatypes) {
        // remove 'false' from array (can happen if CSV cell is empty)
        $typesFiltered = array_filter($datatypes);

        if (empty($typesFiltered)) {
            return false;
        }

        $typesFreq = array_count_values($typesFiltered);
        arsort($typesFreq);
        reset($typesFreq);

        return key($typesFreq);

    }

    /**
     * Check data type foreach Column
     * Check data type for each column and returns the most commonly.
     *
     * Requires PHP >= 5.5
     *
     * @access public
     *
     * @uses   getDatatypeFromString
     *
     * @return array|bool
     */
    public function getDatatypes() {
        if (empty($this->data)) {
            $this->data = $this->parse_string();
        }
        if (!is_array($this->data)) {
            throw new \UnexpectedValueException('No data set yet.');
        }

        $result = [];
        foreach ($this->titles as $cName) {
            $column = array_column($this->data, $cName);
            $cDatatypes = array_map('ParseCsv\enums\DatatypeEnum::getValidTypeFromSample', $column);

            $result[$cName] = $this->getMostFrequentDatatypeForColumn($cDatatypes);
        }

        $this->data_types = $result;

        return !empty($this->data_types) ? $this->data_types : [];
    }
}
