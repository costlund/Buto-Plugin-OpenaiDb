<?php
class PluginOpenaiDb{
  private $settings = null;
  private $mysql = null;
  function __construct() {
    /**
     * settings
     */
    $this->settings = wfPlugin::getPluginSettings('openai/db', true);
    $this->settings->set('settings', wfSettings::getSettingsFromYmlString($this->settings->get('settings')));
    if(!$this->settings->get('settings')){
      wfException::getException(__CLASS__, __FUNCTION__, 'Settings is missing.');
    }
    /**
     * mysql
     */
    wfPlugin::includeonce('wf/mysql');
    $this->mysql =new PluginWfMysql();
  }
  public function db_open(){
    $this->mysql->open($this->settings->get('settings'));
  }
  public function getSql($key){
    $sql = new PluginWfYml(__DIR__.'/sql/sql.yml', $key);
    return $sql;
  }
  public function db_openai_chat_insert($request, $responce, $tag = null){
    $uid = wfCrypt::getUid();
    $sql = $this->getSql(__FUNCTION__, __DIR__);
    $sql->setByTag(array('id' => $uid, 'request' => $request, 'response' => $responce, 'tag' => $tag));
    $this->db_open();
    $this->mysql->execute($sql->get());
    return $uid;
  }
  public function db_openai_chat_select(){
    $sql = $this->getSql(__FUNCTION__, __DIR__);
    $this->db_open();
    $this->mysql->execute($sql->get());
    $rs = $this->mysql->getMany();
    return $rs;
  }
  public function db_openai_chat_select_one_by_tag($tag){
    $sql = $this->getSql(__FUNCTION__, __DIR__);
    $sql->setByTag(array('tag' => $tag));
    $this->db_open();
    $this->mysql->execute($sql->get());
    $rs = $this->mysql->getOne(array('sql' => $sql->get()));
    return $rs;
  }
}