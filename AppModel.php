<?php
//app/Controller/AppModel.php
class AppModel extends Model
{
  /**
   * Connects to specified database
   *
   * @param String name of different database to connect with.
   * @param String name of existing datasource
   * @return boolean true on success, false on failure
   * @access public
   */
    public function setDatabase($database, $datasource = 'default')
    {
      $nds = $datasource . '_' . $database;      
      $db  = &ConnectionManager::getDataSource($datasource);

      $db->setConfig(array(
        'name'       => $nds,
        'database'   => $database,
        'persistent' => false
      ));

      if ( $ds = ConnectionManager::create($nds, $db->config) ) {
        $this->useDbConfig  = $nds;
        $this->cacheQueries = false;
        return true;
      }

      return false;
    }
}
