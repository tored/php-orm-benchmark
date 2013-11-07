<?php

require_once dirname(__FILE__) . '/../AbstractTestSuite.php';

class Propel16WithCacheTestSuite extends AbstractTestSuite
{
    function initialize()
    {
        $loader = require_once __DIR__ . '/../propel_16/vendor/autoload.php';

        set_include_path(__DIR__ . '/build/classes');

        $conf = include realpath(dirname(__FILE__) . '/build/conf/bookstore-conf.php');
        $conf['log'] = null;
        Propel::setConfiguration($conf);
        Propel::initialize();
        Propel::disableInstancePooling();

        $this->con = Propel::getConnection('bookstore');
        $this->con->setAttribute(PropelPDO::PROPEL_ATTR_CACHE_PREPARES, true);
        $this->initTables();
    }

    function clearCache()
    {
        BookPeer::clearInstancePool();
        AuthorPeer::clearInstancePool();
    }

    function beginTransaction()
    {
        $this->con->beginTransaction();
    }

    function commit()
    {
        $this->con->commit();
    }

    function runAuthorInsertion($i)
    {
        $author = new Author();
        $author->setFirstName('John' . $i);
        $author->setLastName('Doe' . $i);
        $author->save($this->con);
        $this->authors[]= $author->getId();
    }

    function runBookInsertion($i)
    {
        $book = new Book();
        $book->setTitle('Hello' . $i);
        $book->setAuthorId($this->authors[array_rand($this->authors)]);
        $book->setISBN('1234');
        $book->setPrice($i);
        $book->save($this->con);
        $this->books[]= $book->getId();
    }

    function runPKSearch($i)
    {
        $author = AuthorQuery::create()
            ->findPk($this->authors[array_rand($this->authors)], $this->con);
    }

    function runComplexQuery($i)
    {
        $authors = AuthorQuery::create()
            ->where('Author.Id > ?', $this->authors[array_rand($this->authors)])
            ->orWhere('(Author.FirstName || Author.LastName) = ?', 'John Doe')
            ->count($this->con);
    }

    function runHydrate($i)
    {
        $books = BookQuery::create()
            ->filterByPrice(array('min' => $i))
            ->limit(5)
            ->find($this->con);
        foreach ($books as $book) {
        }
    }

    function runJoinSearch($i)
    {
        $books = BookQuery::create()
            ->filterByTitle('Hello' . $i)
            ->leftJoinWith('Book.Author')
            ->findOne($this->con);
    }

}