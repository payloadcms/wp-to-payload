import { GlobalConfig } from "payload/types";
import { linkFields } from "../fields/link";

export const Header: GlobalConfig = {
  slug: 'header',
  fields: [
    {
      name: 'items',
      label: 'Menu Items',
      type: 'array',
      fields: [
        {
          name: 'type',
          type: 'radio',
          defaultValue: 'link',
          options: [
            {
              label: 'Link',
              value: 'link',
            },
            {
              label: 'Sub Menu',
              value: 'subMenu',
            }
          ]
        },
        {
          name: 'label',
          type: 'text',
          required: true,
        },
        {
          name: 'link',
          type: 'group',
          admin: {
            condition: (_, siblingData) => siblingData.type === 'link',
          },
          fields: linkFields
        },
        {
          name: 'subMenu',
          type: 'array',
          minRows: 1,
          admin: {
            condition: (_, siblingData) => siblingData.type === 'subMenu',
          },
          fields: [
            {
              name: 'label',
              type: 'text',
              required: true,
            },
            ...linkFields,
          ]
        }
      ]
    }
  ]
}