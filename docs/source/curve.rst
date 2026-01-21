Curve
=====

.. php:class:: Curve

    Represents a curve on a radar diagram

    .. php:method:: __construct(?string $id = null, private readonly ?string $label = null)

        Create a new Curve

        :param ?string $id: Curve id (default: autogenerate id)
        :param ?string $label: Curve label (default: no label)
        :returns: A new ``Curve`` instance
        :rtype: Curve

    .. php:method:: addValue(float|int $value, ?string $axisId = null)

        Add a value to the curve

        :param float|int $value: The value
        :param ?string $axisId: The axis id (default: no axis id)
        :returns: A new ``Curve`` instance with the value
        :rtype: Curve

    .. php:method:: withValues(array $values)

        Set curve values

        :param array $values: The values.
            Either an array of *key*=>*value* pairs where the *key* is the *axis id* for the value,
            or a list of values that are applied to the axes in the order that the axes are defined
        :returns: A new ``Curve`` instance with the value
        :rtype: Curve
