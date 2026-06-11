# Buto-Plugin-OpenaiDb

<p>Built for usage by plugin openai/api_v1. </p>
<ul>
<li>Insert request into db.</li>
<li>Get a record by tag if exist.</li>
</ul>

<a name="key_0"></a>

## Settings



<p>Theme settings.</p>
<pre><code>plugin:
  openai:
    db:
      settings: 'yml:/../buto_data/theme/[theme]/openai_db.yml'</code></pre>
<p>openai_db.yml.</p>
<pre><code>server: '127.0.0.1'
database: 'db_name'
user_name: '...'
password: '...'</code></pre>

<a name="key_1"></a>

## Usage





<a name="key_2"></a>

## Pages





<a name="key_3"></a>

## Widgets





<a name="key_4"></a>

## Event





<a name="key_5"></a>

## Construct





<a name="key_5_0"></a>

### __construct





<a name="key_6"></a>

## Methods





<a name="key_6_0"></a>

### db_open





<a name="key_6_1"></a>

### getSql





<a name="key_6_2"></a>

### db_openai_chat_insert





<a name="key_6_3"></a>

### db_openai_chat_select





<a name="key_6_4"></a>

### db_openai_chat_select_one_by_tag





