<?php



/**
 * This class defines the structure of the 'book' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.bookstore.map
 */
class BookTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bookstore.map.BookTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('book');
        $this->setPhpName('Book');
        $this->setClassname('Book');
        $this->setPackage('bookstore');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->getColumn('title', false)->setPrimaryString(true);
        $this->addColumn('isbn', 'ISBN', 'VARCHAR', true, 24, null);
        $this->addColumn('price', 'Price', 'FLOAT', false, null, null);
        $this->addForeignKey('author_id', 'AuthorId', 'INTEGER', 'author', 'id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Author', 'Author', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'SET NULL', 'CASCADE');
    } // buildRelations()

} // BookTableMap
